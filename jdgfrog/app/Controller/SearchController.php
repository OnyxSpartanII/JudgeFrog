<?php

class SearchController extends AppController {
	
	public $uses = array('AggregateSentence', 'ArrestChargeDetail', 'CaseHasDefendant', 'CaseHasOrganizedCrimeGroup', 'CaseObject', 'Charge', 'Defendant', 'Judge', 'OrganizedCrimeGroup', 'Victim');

	public $helpers = array('Html', 'Form');

	/**
	 * Controller name
	 */
	public $name = 'Search';

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('home','update');
	}

	public function home() {
		$this->set('title', 'Database Search | Human Trafficking Data');
		$this->set('selected', 'search');
	}

	public function update() {
		$this->set('title', 'Database Search | Human Trafficking Data');
		$this->set('selected', 'search');

		$display = array('judge' => false, 'defendant' => false, 'acd' => false, 'sentence' => false, 'ocg' => false, 'victims' => false);

		/**
		 * Case type filter section
		 */
		
		$conditions = array();

		if (!$this->request->data['AggregateSentence']['case_Adult'] || !$this->request->data['AggregateSentence']['case_Minor'] || !$this->request->data['AggregateSentence']['case_Labor']) {
			
			$conditions['ArrestChargeDetail.LaborTraf'] = $this->request->data['AggregateSentence']['case_Labor'];
			$conditions['ArrestChargeDetail.AdultSexTraf'] = $this->request->data['AggregateSentence']['case_Adult'];
			$conditions['ArrestChargeDetail.MinorSexTraf'] = $this->request->data['AggregateSentence']['case_Minor'];

			$acds = $this->ArrestChargeDetail->find('all', array('conditions' => $conditions, 'fields' => array('ArrestChargeDetail.CHD_CaseId')));
			$case_ids = array();
			foreach ($acds as $acd) {
				array_push($case_ids, $acd['ArrestChargeDetail']['CHD_CaseId']);
			}
		}		

		/**
		 * Case filter section
		 */

		$conditions = array();
		
		if (isset($case_ids)) {
			$conditions['CaseObject.CaseId'] = $case_ids;
		}

		if ($this->request->data['AggregateSentence']['case_Name'] != '') {
			$conditions['CaseObject.Name'] = $this->request->data['AggregateSentence']['case_Name'];
		}

		if ($this->request->data['AggregateSentence']['case_Number'] != '') {
			$conditions['CaseObject.Number'] = $this->request->data['AggregateSentence']['case_Number'];
		}

		if ($this->request->data['AggregateSentence']['case_NumDef'] != '') {
			$min = explode(';', $this->request->data['AggregateSentence']['case_NumDef'])[0];
			$max = explode(';', $this->request->data['AggregateSentence']['case_NumDef'])[1];
			$conditions['CaseObject.Num_Defendants >='] = $min;
			$conditions['CaseObject.Num_Defendants <='] = $max;
		}

		if ($this->request->data['AggregateSentence']['case_State'] != '') {
			$conditions['CaseObject.State'] = $this->request->data['AggregateSentence']['case_State'];
		}

		if ($this->request->data['AggregateSentence']['case_FedDist'] != '') {
			$conditions['CaseObject.FederalDistrict'] = $this->request->data['AggregateSentence']['case_FedDist'];
		}

		$cases = $this->CaseObject->find('all', array('conditions' => $conditions));

		/**
		 * CaseHasDefendant filter section
		 */

		$conditions = array();
		
		if (isset($case_ids)) {
			$conditions['CaseHasDefendant.CaseId'] = $case_ids;
		} else {
			$conditions['CaseHasDefendant.CaseId'] = array();
			foreach ($cases as $case) {
				array_push($conditions['CaseHasDefendant.CaseId'], $case['CaseObject']['CaseId']);
			}
		}

		$chd = $this->CaseHasDefendant->find('all', array('conditions' => $conditions));

		/**
		 * Defendant filter section
		 */

		$conditions = array();

		if (isset($chd)) {
			$conditions['Defendant.DefendantId'] = array();
			foreach ($chd as $d) {
				array_push($conditions['Defendant.DefendantId'], $d['CaseHasDefendant']['DefendantId']);
			}
		}

		if ($this->request->data['AggregateSentence']['defendant_Name'] != '') {
			$conditions['Defendant.Lastname'] = $this->request->data['AggregateSentence']['defendant_Name'];
			$display['defendant'] = true;
		}

		if ($this->request->data['AggregateSentence']['defendant_Gender'] != '') {
			$conditions['Defendant.Gender'] = $this->request->data['AggregateSentence']['defendant_Gender'];
			$display['defendant'] = true;
		}

		if ($this->request->data['AggregateSentence']['defendant_Race'] != '') {
			$conditions['Defendant.Race'] = $this->request->data['AggregateSentence']['defendant_Race'];
			$display['defendant'] = true;
		}
		

		if ($this->request->data['AggregateSentence']['defendant_YOB'] != '') {
			$conditions['Defendant.Birthdate >='] = explode(';',$this->request->data['AggregateSentence']['defendant_YOB'])[0];
			$conditions['Defendant.Birthdate <='] = explode(';',$this->request->data['AggregateSentence']['defendant_YOB'])[1];
			$display['defendant'] = true;
		}

		$defendants = $this->Defendant->find('all', array('conditions' => $conditions));

		$defendant_ids = array();
		foreach ($defendants as &$def) {
			foreach ($chd as $d) {
				if ($d['CaseHasDefendant']['DefendantId'] == $def['Defendant']['DefendantId']) {
					$def['Defendant']['CaseId'] = $d['CaseHasDefendant']['CaseId'];
				}
			}
			array_push($defendant_ids, $def['Defendant']['DefendantId']);
			unset($def);
		}

		if ($display['defendant'] && sizeof($defendants) == 0) {
			$this->render('home');
			return;
		}

		/**
		 * Judge filter section
		 */
		
		$conditions = array();

		if (!isset($judge_ids)) {
			$conditions['Judge.JudgeId'] = array();
			foreach ($cases as $case) {
				array_push($conditions['Judge.JudgeId'], $case['CaseObject']['JudgeId']);
			}
		}

		if ($this->request->data['AggregateSentence']['judge_Name'] != '') {
			$conditions['Judge.Name'] = $this->request->data['AggregateSentence']['judge_Name'];
			$display['judge'] = true;
		}

		if ($this->request->data['AggregateSentence']['judge_Race'] != '') {
			$conditions['Judge.Race'] = $this->request->data['AggregateSentence']['judge_Race'];
			$display['judge'] = true;
		}

		if ($this->request->data['AggregateSentence']['judge_Gender'] != '') {
			$conditions['Judge.Gender'] = $this->request->data['AggregateSentence']['judge_Gender'];
			$display['judge'] = true;
		}

		if ($this->request->data['AggregateSentence']['judge_ApptBy'] != '') {
			$conditions['Judge.AppointedBy'] = $this->request->data['AggregateSentence']['judge_ApptBy'];
			$display['judge'] = true;
		}

		if ($this->request->data['AggregateSentence']['judge_YearApp'] != '1960;2020') {
			$conditions['Judge.Tenure >='] = explode(';',$this->request->data['AggregateSentence']['judge_YearApp'])[0];
			$conditions['Judge.Tenure <='] = explode(';',$this->request->data['AggregateSentence']['judge_YearApp'])[1];
			$display['judge'] = true;
		}

		$judges = $this->Judge->find('all', array('conditions' => $conditions));

		if ($display['judge'] && sizeof($judges) == 0) {
			return;
		}

		/**
		 * CaseHasOrganizedCrimeGroup filter section
		 */
		
		$conditions = array();

		if (isset($cases)) {
			$conditions['CaseHasOrganizedCrimeGroup.CaseId'] = array();
			foreach ($cases as $case) {
				array_push($conditions['CaseHasOrganizedCrimeGroup.CaseId'], $case['CaseObject']['CaseId']);
			}
		}

		$chocg = $this->CaseHasOrganizedCrimeGroup->find('all', array('conditions' => $conditions));

		/**
		 * OrganizedCrimeGroup filter section
		 */
		
		$conditions = array();

		if (isset($chocg)) {
			$conditions['OrganizedCrimeGroup.OCGId'] = array();
			foreach ($chocg as $o) {
				array_push($conditions['OrganizedCrimeGroup.OCGId'], $o['CaseHasOrganizedCrimeGroup']['OCGId']);
			}
		}

		if ($this->request->data['AggregateSentence']['ocg_Name'] != '') {
			$conditions['OrganizedCrimeGroup.Name'] = $this->request->data['AggregateSentence']['ocg_Name'];
			$display['ocg'] = true;
		}

		if ($this->request->data['AggregateSentence']['ocg_Type'] != '') {
			$conditions['OrganizedCrimeGroup.Size'] = $this->request->data['AggregateSentence']['ocg_Type'];
			$display['ocg'] = true;
		}

		if ($this->request->data['AggregateSentence']['ocg_Scope'] != '') {
			$conditions['OrganizedCrimeGroup.Scope'] = $this->request->data['AggregateSentence']['ocg_Scope'];
			$display['ocg'] = true;
		}

		if ($this->request->data['AggregateSentence']['ocg_Race'] != '') {
			$conditions['OrganizedCrimeGroup.Race'] = $this->request->data['AggregateSentence']['ocg_Race'];
			$display['ocg'] = true;
		}

		$ocgs = $this->OrganizedCrimeGroup->find('all', array('conditions' => $conditions));

		foreach ($ocgs as &$ocg) {
			foreach ($chocg as $co) {
				if ($ocg['OrganizedCrimeGroup']['OCGId'] == $co['CaseHasOrganizedCrimeGroup']['OCGId']) {
					$ocg['OrganizedCrimeGroup']['CaseId'] = $co['CaseHasOrganizedCrimeGroup']['CaseId'];
				}
			}
			unset($ocg);
		}

		if (sizeof($ocgs) == 0 && $display['ocg']) {
			$this->render('home');
			return;
		}

		/**
		 * Victims filter section
		 */
		
		$conditions = array();

		if (isset($cases)) {
			$conditions['Victim.VictimsId'] = array();
			foreach ($cases as $case) {
				array_push($conditions['Victim.VictimsId'], $case['CaseObject']['VictimsId']);
			}
		}

		if ($this->request->data['AggregateSentence']['victims_Total'] != '0;100') {
			$conditions['Victim.Total >='] = explode(';',$this->request->data['AggregateSentence']['victims_Total'])[0];
			$conditions['Victim.Total <='] = explode(';',$this->request->data['AggregateSentence']['victims_Total'])[1];
			$display['victims'] = true;
		}

		if ($this->request->data['AggregateSentence']['victims_Minor'] != '0;100') {
			$conditions['Victim.Minor >='] = explode(';',$this->request->data['AggregateSentence']['victims_Minor'])[0];
			$conditions['Victim.Minor <='] = explode(';',$this->request->data['AggregateSentence']['victims_Minor'])[1];
			$display['victims'] = true;
		}

		if ($this->request->data['AggregateSentence']['victims_Foreign'] != '0;100') {
			$conditions['Victim.Foreigner >='] = explode(';',$this->request->data['AggregateSentence']['victims_Foreign'])[0];
			$conditions['Victim.Foreigner <='] = explode(';',$this->request->data['AggregateSentence']['victims_Foreign'])[1];
			$display['victims'] = true;
		}

		if ($this->request->data['AggregateSentence']['victims_Female'] != '0;100') {
			$conditions['Victim.Female >='] = explode(';',$this->request->data['AggregateSentence']['victims_Female'])[0];
			$conditions['Victim.Female <='] = explode(';',$this->request->data['AggregateSentence']['victims_Female'])[1];
			$display['victims'] = true;
		}

		$victims = $this->Victim->find('all', array('conditions' => $conditions));

		if (sizeof($victims) == 0 && $display['victims']) {
			$this->render('home');
			return;
		}

		/**
		 * ArrestChargeDetails filter section
		 */
		
		$conditions = array();

		/* AD */

		if (isset($case_ids) && isset($defendant_ids)) {
			$conditions['ArrestChargeDetail.CHD_CaseId'] = $case_ids;
			$conditions['ArrestChargeDetail.CHD_DefendantId'] = $defendant_ids;
		}

		if ($this->request->data['AggregateSentence']['ad_DateArrest'] != '2000;2020') {
			$conditions['ArrestChargeDetail.ArrestDate >='] = explode(';',$this->request->data['AggregateSentence']['ad_DateArrest'])[0];
			$conditions['ArrestChargeDetail.ArrestDate <='] = explode(';',$this->request->data['AggregateSentence']['ad_DateArrest'])[1];
			$display['acd'] = true;
		}

		if ($this->request->data['AggregateSentence']['ad_Role'] != '') {
			$conditions['ArrestChargeDetail.Role'] = $this->request->data['AggregateSentence']['ad_Role'];
			$display['acd'] = true;
		}

		if ($this->request->data['AggregateSentence']['ad_BailType'] != '') {
			$conditions['ArrestChargeDetail.BailType'] = $this->request->data['AggregateSentence']['ad_BailType'];
			$display['acd'] = true;
		}

		if ($this->request->data['AggregateSentence']['ad_BailAmount'] != '1000;100000') {	
			$conditions['ArrestChargeDetail.BailAmount >='] = explode(';',$this->request->data['AggregateSentence']['ad_BailAmount'])[0];
			$conditions['ArrestChargeDetail.BailAmount <='] = explode(';',$this->request->data['AggregateSentence']['ad_BailAmount'])[1];
			$display['acd'] = true;
		}

		/* CD */
		if ($this->request->data['AggregateSentence']['cd_Date'] != '2000;2020') {	
			$conditions['ArrestChargeDetail.ChargeDate >='] = explode(';',$this->request->data['AggregateSentence']['cd_Date'])[0];
			$conditions['ArrestChargeDetail.ChargeDate <='] = explode(';',$this->request->data['AggregateSentence']['cd_Date'])[1];
			$display['acd'] = true;
		}

		if ($this->request->data['AggregateSentence']['cd_TtlCharges'] != '0;20') {	
			$conditions['ArrestChargeDetail.Fel_C >='] = explode(';',$this->request->data['AggregateSentence']['cd_TtlCharges'])[0];
			$conditions['ArrestChargeDetail.Fel_C <='] = explode(';',$this->request->data['AggregateSentence']['cd_TtlCharges'])[1];
			$display['acd'] = true;
		}

		$acds = $this->ArrestChargeDetail->find('all', array('conditions' => $conditions));

		$acd_ids = array();
		foreach ($acds as $acd) {
			array_push($acd_ids, $acd['ArrestChargeDetail']['ACDId']);
		}

		if (sizeof($acds) == 0 && $display['acd']) {
			return;
		}

		$conditions = array();

		if (isset($case_ids) && isset($defendant_ids)) {
			$conditions['Charge.ACDId'] = $acd_ids;
			$conditions['Charge.ACD_CHD_CaseId'] = $case_ids;
			$conditions['Charge.ACD_CHD_DefendantId'] = $defendant_ids;
		}

		// charge
		if ($this->request->data['AggregateSentence']['cd_Counts'] != '0;10') {	
			$conditions['Charge.Counts >='] = explode(';',$this->request->data['AggregateSentence']['cd_Counts'])[0];
			$conditions['Charge.Counts <='] = explode(';',$this->request->data['AggregateSentence']['cd_Counts'])[1];
			$display['acd'] = true;
		}

		// charge
		if ($this->request->data['AggregateSentence']['cd_CountsNP'] != '0;10') {	
			$conditions['Charge.CountsNolleProssed >='] = explode(';',$this->request->data['AggregateSentence']['cd_CountsNP'])[0];
			$conditions['Charge.CountsNolleProssed <='] = explode(';',$this->request->data['AggregateSentence']['cd_CountsNP'])[1];
			$display['acd'] = true;
		}

		// charge
		if ($this->request->data['AggregateSentence']['cd_PleaDismiss'] != '0;10') {	
			$conditions['Charge.PleaDismissed >='] = explode(';',$this->request->data['AggregateSentence']['cd_PleaDismiss'])[0];
			$conditions['Charge.PleaDismissed <='] = explode(';',$this->request->data['AggregateSentence']['cd_PleaDismiss'])[1];
			$display['acd'] = true;
		}

		// charge
		if ($this->request->data['AggregateSentence']['cd_PleaGuilty'] != '0;10') {	
			$conditions['Charge.PleaGuilty >='] = explode(';',$this->request->data['AggregateSentence']['cd_PleaGuilty'])[0];
			$conditions['Charge.PleaGuilty <='] = explode(';',$this->request->data['AggregateSentence']['cd_PleaGuilty'])[1];
			$display['acd'] = true;
		}

		// charge
		if ($this->request->data['AggregateSentence']['cd_TrialGuilty'] != '0;10') {	
			$conditions['Charge.TrialGuilty >='] = explode(';',$this->request->data['AggregateSentence']['cd_TrialGuilty'])[0];
			$conditions['Charge.TrialGuilty <='] = explode(';',$this->request->data['AggregateSentence']['cd_TrialGuilty'])[1];
			$display['acd'] = true;
		}

		// charge
		if ($this->request->datat['AggregateSentence']['cd_TrialNotGuilty'] != '0;10') {	
			$conditions['Charge.TrialNotGuilty >='] = explode(';',$this->request->data['AggregateSentence']['cd_TrialNotGuilty'])[0];
			$conditions['Charge.TrialNotGuilty <='] = explode(';',$this->request->data['AggregateSentence']['cd_TrialNotGuilty'])[1];
			$display['acd'] = true;
		}

		// charge
		if ($this->request->data['AggregateSentence']['cd_Sentence'] != '0;300') {	
			$conditions['Charge.Sentence >='] = explode(';',$this->request->data['AggregateSentence']['cd_Sentence'])[0];
			$conditions['Charge.Sentence <='] = explode(';',$this->request->data['AggregateSentence']['cd_Sentence'])[1];
			$display['acd'] = true;
		}

		// charge
		if ($this->request->data['AggregateSentence']['cd_Probation'] != '0;300') {	
			$conditions['Charge.Probation >='] = explode(';',$this->request->data['AggregateSentence']['cd_Probation'])[0];
			$conditions['Charge.Probation <='] = explode(';',$this->request->data['AggregateSentence']['cd_Probation'])[1];
			$display['acd'] = true;
		}

		$charges = $this->Charge->find('all', array('conditions' => $conditions));

		if (sizeof($charges) == 0 && $display['acd']) {
			$this->render('home');
			return;
		}

		/**
		 * Sentence filter section
		 */
		
		$conditions = array();

		if (isset($case_ids) && isset($defendant_ids)) {
			$conditions['AggregateSentence.CHD_CaseId'] = $case_ids;
			$conditions['AggregateSentence.CHD_DefendantId'] = $defendant_ids;
		}

		if ($this->request->data['AggregateSentence']['sd_TtlFelonies'] != '0;10') {
			$conditions['AggregateSentence.Fel_S >='] = explode(';',$this->request->data['AggregateSentence']['sd_TtlFelonies'])[0];
			$conditions['AggregateSentence.Fel_S <='] = explode(';',$this->request->data['AggregateSentence']['sd_TtlFelonies'])[1];
			$display['sentence'] = true;
		}

		if ($this->request->data['AggregateSentence']['sd_DateTerminated'] != '2000;2020') {
			$conditions['AggregateSentence.DateTerminated >='] = explode(';',$this->request->data['AggregateSentence']['sd_TtlFelonies'])[0];
			$conditions['AggregateSentence.DateTerminated <='] = explode(';',$this->request->data['AggregateSentence']['sd_TtlFelonies'])[1];
			$display['sentence'] = true;
		}

		if ($this->request->data['AggregateSentence']['sd_TtlMonths'] != '0;300') {
			$conditions['AggregateSentence.Total >='] = explode(';',$this->request->data['AggregateSentence']['sd_TtlMonths'])[0];
			$conditions['AggregateSentence.Total <='] = explode(';',$this->request->data['AggregateSentence']['sd_TtlMonths'])[1];
			$display['sentence'] = true;
		}

		if ($this->request->data['AggregateSentence']['sd_Restitution'] != '0;10000000') {
			$conditions['AggregateSentence.Restitution >='] = explode(';',$this->request->data['AggregateSentence']['sd_Restitution'])[0];
			$conditions['AggregateSentence.Restitution <='] = explode(';',$this->request->data['AggregateSentence']['sd_Restitution'])[1];
			$display['sentence'] = true;
		}

		if ($this->request->data['AggregateSentence']['sd_AssetForfeit'] != '') {
			$conditions['AggregateSentence.AssetForfeit'] = $this->request->data['AggregateSentence']['sd_AssetForfeit'];
			$display['sentence'] = true;
		}

		if ($this->request->data['AggregateSentence']['sd_Appeal'] != '') {
			$conditions['AggregateSentence.Appeal'] = $this->request->data['AggregateSentence']['sd_Appeal'];
			$display['sentence'] = true;
		}

		if ($this->request->data['AggregateSentence']['sd_MonthsProb'] != '0;50') {
			$conditions['AggregateSentence.Probation >='] = explode(';',$this->request->data['AggregateSentence']['sd_MonthsProb'])[0];
			$conditions['AggregateSentence.Probation <='] = explode(';',$this->request->data['AggregateSentence']['sd_MonthsProb'])[1];
			$display['sentence'] = true;
		}

		$ags = $this->AggregateSentence->find('all', array('conditions' => $conditions));

		if (sizeof($ags) == 0 && $display['sentence']) {
			$this->render('home');
			return;
		}

		foreach ($ags as $ag) {
			foreach ($cases as &$case) {
				if ($case['CaseObject']['CaseId'] == $ag['AggregateSentence']['CHD_CaseId']) {
					$case['CaseObject']['Year'] = $ag['AggregateSentence']['Date'];
				}
			}
			unset($case);
		}

		foreach ($cases as &$case) {
			if ($display['defendant']) {
				$case['CaseObject']['Verified'] = false;
				foreach ($defendants as $def) {
					if ($def['Defendant']['CaseId'] == $case['CaseObject']['CaseId']) {
						$case['CaseObject']['Verified'] = true;
						break;
					}
				}
				
			}
			if ($display['judge']) {
				$case['CaseObject']['Verified'] = false;
				foreach ($judges as $judge) {
					if ($case['CaseObject']['JudgeId'] == $judge['Judge']['JudgeId']) {
						$case['CaseObject']['Verified'] = true;
						break;
					}
				}
			}

			if ($display['ocg']) {
				$case['CaseObject']['Verified'] = false;
				foreach ($ocgs as $ocg) {
					if ($case['CaseObject']['CaseId'] == $ocg['OrganizedCrimeGroup']['CaseId']) {
						$case['CaseObject']['Verified'] = true;
						break;
					}
				}
			}

			if ($display['victims']) {
				$case['CaseObject']['Verified'] = false;
				foreach ($victims as $victim) {
					if ($case['CaseObject']['VictimsId'] == $victim['Victim']['VictimId']) {
						$case['CaseObject']['Verified'] = true;
						break;
					}
				}
			}

			if ($display['acd']) {
				$case['CaseObject']['Verified'] = false;
				foreach ($acds as $acd) {
					if ($case['CaseObject']['CaseId'] == $acd['ArrestChargeDetail']['CHD_CaseId']) {
						$case['CaseObject']['Verified'] = true;
						break;
					}
				}
			}

			if ($display['sentence']) {
				$case['CaseObject']['Verified'] = false;
				foreach ($ags as $ag) {
					if ($case['CaseObject']['CaseId'] == $ag['AggregateSentence']['CHD_CaseId']) {
						$case['CaseObject']['Verified'] = true;
						break;
					}
				}
			}
		}

		print_r($cases);
		echo '<br><br>';
		print_r($defendants);
		echo '<br><br>';
		print_r($judges);
		echo '<br><br>';
		print_r($acds);
		echo '<br><br>';
		print_r($charges);
		echo '<br><br>';
		print_r($ags);
		echo '<br><br>';
		print_r($ocgs);
		echo '<br><br>';
		print_r($victims);

		echo 'Setting cases';
		$this->set('cases', $cases);
		$this->render('home');
	}
}