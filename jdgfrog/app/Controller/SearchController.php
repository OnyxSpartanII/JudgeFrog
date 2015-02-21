<?php

class SearchController extends AppController {
	
	public $uses = array('DataInProgress');

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
		$this->set('active', 'search');
	}

	public function update() {
		$this->set('title', 'Database Search | Human Trafficking Data');
		$this->set('active', 'search');

		$display = array('judge' => false, 'defendant' => false, 'acd' => false, 'sentence' => false, 'ocg' => false, 'victims' => false, 'cd' => false);

		/**
		 * Case type filter section
		 */
		
		$conditions = array();

		if (!$this->request->data['DataInProgress']['case_Adult'] || !$this->request->data['DataInProgress']['case_Minor'] || !$this->request->data['DataInProgress']['case_Labor']) {
			
			$conditions['DataInProgress.LaborTraf'] = $this->request->data['DataInProgress']['case_Labor'];
			$conditions['DataInProgress.AdultSexTraf'] = $this->request->data['DataInProgress']['case_Adult'];
			$conditions['DataInProgress.MinorSexTraf'] = $this->request->data['DataInProgress']['case_Minor'];
		}		

		/**
		 * Case filter section
		 */

		if ($this->request->data['DataInProgress']['case_Name'] != '') {
			$conditions['DataInProgress.CaseNam'] = $this->request->data['DataInProgress']['case_Name'];
		}

		if ($this->request->data['DataInProgress']['case_Number'] != '') {
			$conditions['DataInProgress.CaseNum'] = $this->request->data['DataInProgress']['case_Number'];
		}

		if ($this->request->data['DataInProgress']['case_NumDef'] != '0;100') {
			$min = explode(';', $this->request->data['DataInProgress']['case_NumDef'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['case_NumDef'])[1];
			$conditions['DataInProgress.NumDef >='] = $min;
			$conditions['DataInProgress.NumDef <='] = $max;
		}

		if ($this->request->data['DataInProgress']['case_State'] != '') {
			$conditions['DataInProgress.State'] = $this->request->data['DataInProgress']['case_State'];
		}

		if ($this->request->data['DataInProgress']['case_FedDist'] != 0) {
			$conditions['DataInProgress.FedDistrictNum'] = $this->request->data['DataInProgress']['case_FedDist'];
		}

		/**
		 * Defendant filter section
		 */

		if ($this->request->data['DataInProgress']['defendant_Name'] != '') {
			$conditions['DataInProgress.DefLast'] = $this->request->data['DataInProgress']['defendant_Name'];
			$display['defendant'] = true;
		}

		if ($this->request->data['DataInProgress']['defendant_Gender'] != '') {
			$conditions['DataInProgress.DefGender'] = $this->request->data['DataInProgress']['defendant_Gender'];
			$display['defendant'] = true;
		}

		if ($this->request->data['DataInProgress']['defendant_Race'] != '') {
			$conditions['DataInProgress.DefRace'] = $this->request->data['DataInProgress']['defendant_Race'];
			$display['defendant'] = true;
		}
		

		if ($this->request->data['DataInProgress']['defendant_YOB'] != '1930;2014') {
			$conditions['DataInProgress.DefBirthdate >='] = explode(';',$this->request->data['DataInProgress']['defendant_YOB'])[0];
			$conditions['DataInProgress.DefBirthdate <='] = explode(';',$this->request->data['DataInProgress']['defendant_YOB'])[1];
			$display['defendant'] = true;
		}

		/**
		 * Judge filter section
		 */

		if ($this->request->data['DataInProgress']['judge_Name'] != '') {
			$conditions['DataInProgress.JudgeName'] = $this->request->data['DataInProgress']['judge_Name'];
			$display['judge'] = true;
		}

		if ($this->request->data['DataInProgress']['judge_Race'] != '') {
			$conditions['DataInProgress.JudgeRace'] = $this->request->data['DataInProgress']['judge_Race'];
			$display['judge'] = true;
		}

		if ($this->request->data['DataInProgress']['judge_Gender'] != '') {
			$conditions['DataInProgress.JudgeGen'] = $this->request->data['DataInProgress']['judge_Gender'];
			$display['judge'] = true;
		}

		if ($this->request->data['DataInProgress']['judge_ApptBy'] != '') {
			$conditions['DataInProgress.JudgeApptBy'] = $this->request->data['DataInProgress']['judge_ApptBy'];
			$display['judge'] = true;
		}

		if ($this->request->data['DataInProgress']['judge_YearApp'] != '1960;2020') {
			$conditions['DataInProgress.JudgeTenure >='] = explode(';',$this->request->data['DataInProgress']['judge_YearApp'])[0];
			$conditions['DataInProgress.JudgeTenure <='] = explode(';',$this->request->data['DataInProgress']['judge_YearApp'])[1];
			$display['judge'] = true;
		}

		/**
		 * Victims filter section
		 */

		if ($this->request->data['DataInProgress']['victims_Total'] != '0;100') {
			$conditions['DataInProgress.NumVic >='] = explode(';',$this->request->data['DataInProgress']['victims_Total'])[0];
			$conditions['DataInProgress.NumVic <='] = explode(';',$this->request->data['DataInProgress']['victims_Total'])[1];
			$display['victims'] = true;
		}

		if ($this->request->data['DataInProgress']['victims_Minor'] != '0;100') {
			$conditions['DataInProgress.NumVicMinor >='] = explode(';',$this->request->data['DataInProgress']['victims_Minor'])[0];
			$conditions['DataInProgress.NumVicMinor <='] = explode(';',$this->request->data['DataInProgress']['victims_Minor'])[1];
			$display['victims'] = true;
		}

		if ($this->request->data['DataInProgress']['victims_Foreign'] != '0;100') {
			$conditions['DataInProgress.NumVicForeign >='] = explode(';',$this->request->data['DataInProgress']['victims_Foreign'])[0];
			$conditions['DataInProgress.NumVicForeign <='] = explode(';',$this->request->data['DataInProgress']['victims_Foreign'])[1];
			$display['victims'] = true;
		}

		if ($this->request->data['DataInProgress']['victims_Female'] != '0;100') {
			$conditions['DataInProgress.NumVicFemale >='] = explode(';',$this->request->data['DataInProgress']['victims_Female'])[0];
			$conditions['DataInProgress.NumVicFemale <='] = explode(';',$this->request->data['DataInProgress']['victims_Female'])[1];
			$display['victims'] = true;
		}

		/**
		 * ArrestChargeDetails filter section
		 */

		if ($this->request->data['DataInProgress']['ad_DateArrest'] != '2000;2020') {
			$conditions['DataInProgress.ArrestDate >='] = explode(';',$this->request->data['DataInProgress']['ad_DateArrest'])[0];
			$conditions['DataInProgress.ArrestDate <='] = explode(';',$this->request->data['DataInProgress']['ad_DateArrest'])[1];
			$display['acd'] = true;
		}

		if ($this->request->data['DataInProgress']['ad_Role'] != '') {
			$conditions['DataInProgress.Role'] = $this->request->data['DataInProgress']['ad_Role'];
			$display['acd'] = true;
		}

		if ($this->request->data['DataInProgress']['ad_BailType'] != '') {
			$conditions['DataInProgress.BailType'] = $this->request->data['DataInProgress']['ad_BailType'];
			$display['acd'] = true;
		}

		if ($this->request->data['DataInProgress']['ad_BailAmount'] != '1000;100000') {	
			$conditions['DataInProgress.BailAmount >='] = explode(';',$this->request->data['DataInProgress']['ad_BailAmount'])[0];
			$conditions['DataInProgress.BailAmount <='] = explode(';',$this->request->data['DataInProgress']['ad_BailAmount'])[1];
			$display['acd'] = true;
		}

		/* CD */
		if ($this->request->data['DataInProgress']['cd_Date'] != '2000;2020') {	
			$conditions['DataInProgress.ChargeDate >='] = explode(';',$this->request->data['DataInProgress']['cd_Date'])[0];
			$conditions['DataInProgress.ChargeDate <='] = explode(';',$this->request->data['DataInProgress']['cd_Date'])[1];
			$display['acd'] = true;
		}

		if ($this->request->data['DataInProgress']['cd_TtlCharges'] != '0;20') {	
			$conditions['DataInProgress.FelCharged >='] = explode(';',$this->request->data['DataInProgress']['cd_TtlCharges'])[0];
			$conditions['DataInProgress.FelCharged <='] = explode(';',$this->request->data['DataInProgress']['cd_TtlCharges'])[1];
			$display['acd'] = true;
		}

		/**
		 * Sentence filter section
		 */

		if ($this->request->data['DataInProgress']['sd_TtlFelonies'] != '0;10') {
			$conditions['DataInProgress.FelSentenced >='] = explode(';',$this->request->data['DataInProgress']['sd_TtlFelonies'])[0];
			$conditions['DataInProgress.FelSentenced <='] = explode(';',$this->request->data['DataInProgress']['sd_TtlFelonies'])[1];
			$display['sentence'] = true;
		}

		if ($this->request->data['DataInProgress']['sd_DateTerminated'] != '2000;2020') {
			$conditions['DataInProgress.DateTerm >='] = explode(';',$this->request->data['DataInProgress']['sd_TtlFelonies'])[0];
			$conditions['DataInProgress.DateTerm <='] = explode(';',$this->request->data['DataInProgress']['sd_TtlFelonies'])[1];
			$display['sentence'] = true;
		}

		if ($this->request->data['DataInProgress']['sd_TtlMonths'] != '0;300') {
			$conditions['DataInProgress.TotalSentence >='] = explode(';',$this->request->data['DataInProgress']['sd_TtlMonths'])[0];
			$conditions['DataInProgress.TotalSentence <='] = explode(';',$this->request->data['DataInProgress']['sd_TtlMonths'])[1];
			$display['sentence'] = true;
		}

		if ($this->request->data['DataInProgress']['sd_Restitution'] != '0;10000000') {
			$conditions['DataInProgress.Restitution >='] = explode(';',$this->request->data['DataInProgress']['sd_Restitution'])[0];
			$conditions['DataInProgress.Restitution <='] = explode(';',$this->request->data['DataInProgress']['sd_Restitution'])[1];
			$display['sentence'] = true;
		}

		if ($this->request->data['DataInProgress']['sd_AssetForfeit'] != '') {
			$conditions['DataInProgress.AssetForfeit'] = $this->request->data['DataInProgress']['sd_AssetForfeit'];
			$display['sentence'] = true;
		}

		if ($this->request->data['DataInProgress']['sd_Appeal'] != '') {
			$conditions['DataInProgress.Appeal'] = $this->request->data['DataInProgress']['sd_Appeal'];
			$display['sentence'] = true;
		}

		if ($this->request->data['DataInProgress']['sd_MonthsProb'] != '0;50') {
			$conditions['DataInProgress.Probation >='] = explode(';',$this->request->data['DataInProgress']['sd_MonthsProb'])[0];
			$conditions['DataInProgress.Probation <='] = explode(';',$this->request->data['DataInProgress']['sd_MonthsProb'])[1];
			$display['sentence'] = true;
		}

		$datum = $this->DataInProgress->find('all', array('conditions' => $conditions));

		// print_r($datum);

		$conditions = array();

		/**
		 * OrganizedCrimeGroup filter section
		 */

		if ($this->request->data['DataInProgress']['ocg_Name'] != '') {
			$conditions['OCName'] = $this->request->data['DataInProgress']['ocg_Name'];
			$display['ocg'] = true;
		}

		if ($this->request->data['DataInProgress']['ocg_Type'] != '') {
			$conditions['OCType'] = $this->request->data['DataInProgress']['ocg_Type'];
			$display['ocg'] = true;
		}

		if ($this->request->data['DataInProgress']['ocg_Scope'] != '') {
			$conditions['OCScope'] = $this->request->data['DataInProgress']['ocg_Scope'];
			$display['ocg'] = true;
		}

		if ($this->request->data['DataInProgress']['ocg_Race'] != '') {
			$conditions['OCRace'] = $this->request->data['DataInProgress']['ocg_Race'];
			$display['ocg'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_Counts'] != '0;10') {	
			$conditions['Counts'] = $this->request->data['DataInProgress']['cd_Counts'];
			echo isset($conditions['Counts']);
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_CountsNP'] != '0;10') {	
			$conditions['CountsNP'] = $this->request->data['DataInProgress']['cd_CountsNP'];
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_PleaDismiss'] != '0;10') {
			$conditions['PleaDismissed'] = $this->request->data['DataInProgress']['cd_PleaDismiss'];
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_PleaGuilty'] != '0;10') {	
			$conditions['PleaGuilty'] = $this->request->data['DataInProgress']['cd_PleaGuilty'];
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_TrialGuilty'] != '0;10') {	
			$conditions['TrialGuilty'] = $this->request->data['DataInProgress']['cd_TrialGuilty'];
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_TrialNotGuilty'] != '0;10') {	
			$conditions['TrialNG'] = $this->request->data['DataInProgress']['cd_TrialNotGuilty'];
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_Sentence'] != '0;300') {	
			$conditions['Sentence'] = $this->request->data['DataInProgress']['cd_Sentence'];
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_Probation'] != '0;300') {	
			$conditions['Prob'] = $this->request->data['DataInProgress']['cd_Probation'];
			$display['cd'] = true;
		}

		$conditions = array();
		$display = array('judge' => false, 'defendant' => false, 'acd' => false, 'sentence' => false, 'ocg' => false, 'victims' => false, 'cd' => false);

		foreach ($datum as &$data) {
			if ($display['ocg']) {
				if (isset($conditions['OCName']) && ($data['DataInProgress']['OCName1'] != $conditions['OCGName'] && $data['DataInProgress']['OCName2'] != $conditions['OCName'])) {
					unset($data);
					continue;
				}
				if (isset($conditions['OCType']) && ($data['DataInProgress']['OCType1'] != $conditions['OCGType'] && $data['DataInProgress']['OCType2'] != $conditions['OCType'])) {
					unset($data);
					continue;
				}
				if (isset($conditions['OCScope']) && ($data['DataInProgress']['OCScope1'] != $conditions['OCGScope'] && $data['DataInProgress']['OCScope2'] != $conditions['OCScope'])) {
					unset($data);
					continue;
				}
				if (isset($conditions['OCRace']) && ($data['DataInProgress']['OCRace1'] != $conditions['OCGRace'] && $data['DataInProgress']['OCRace2'] != $conditions['OCRace'])) {
					unset($data);
					continue;
				}
			}

			if ($display['cd']) {

				$vals = preg_grep("/^\d{4}(to\d{4})?$/", array_keys($data));

				foreach ($vals as &$val) {
					if (isset($conditions['Counts'])) {
						if (!(intval($data["Counts$val"]) >= $min && intval($data["Counts$val"]) <= $max)) {
							$data[$val] = 0;
							continue;
						}
					}

					if (isset($conditions['CountsNP'])) {
						if (!(intval($data["CountsNP$val"]) >= $min && intval($data["CountsNP$val"]) <= $max)) {
							$data[$val] = 0;
							continue;
						}
					}

					if (isset($conditions['PleaDismissed'])) {
						if (!(intval($data["PleaDismissed$val"]) >= $min && intval($data["PleaDismissed$val"]) <= $max)) {
							$data[$val] = 0;
							continue;
						}
					}

					if (isset($conditions['PleaGuilty'])) {
						if (!(intval($data["PleaGuilty$val"]) >= $min && intval($data["PleaGuilty$val"]) <= $max)) {
							$data[$val] = 0;
							continue;
						}
					}

					if (isset($conditions['TrialGuilty'])) {
						if (!(intval($data["TrialGuilty$val"]) >= $min && intval($data["TrialGuilty$val"]) <= $max)) {
							$data[$val] = 0;
							continue;
						}
					}

					if (isset($conditions['TrialNG'])) {
						if (!(intval($data["TrialNG$val"]) >= $min && intval($data["TrialNG$val"]) <= $max)) {
							$data[$val] = 0;
							continue;
						}
					}

					if (isset($conditions['Sentence'])) {
						if (!(intval($data["Sentence$val"]) >= $min && intval($data["Sentence$val"]) <= $max)) {
							$data[$val] = 0;
							continue;
						}
					}

					if (isset($conditions['Prob'])) {
						if (!(intval($data["Prob$val"]) >= $min && intval($data["Prob$val"]) <= $max)) {
							$data[$val] = 0;
							continue;
						}
					}
				}
			}
		}

		print_r($datum);
		$statutes = preg_grep("/^\d{4}(to\d{4})?$/", array_keys($datum[0]['DataInProgress']));
		$cases = array();
		$case_name = '';

		foreach ($datum as $d) {
			if (strcmp($d['DataInProgress']['CaseNam'], $case_name) != 0) {
				$charges = array();
				foreach ($statutes as $statute) {
					if ($d['DataInProgress'][$statute] != 0) {
						array_push(
							$charges,
							array(
								$statute,
								$d['DataInProgress']["Counts$statute"],
								$d['DataInProgress']["CountsNP$statute"],
								$d['DataInProgress']["PleaDismissed$statute"],
								$d['DataInProgress']["PleaGuilty$statute"],
								$d['DataInProgress']["TrialGuilty$statute"],
								$d['DataInProgress']["TrialNG$statute"],
								$d['DataInProgress']["Fines$statute"],
								$d['DataInProgress']["Sent$statute"],
								$d['DataInProgress']["Prob$statute"]
							)
						);
					}
				}
				$case_name = $d['DataInProgress']['CaseNam'];
				array_push(
					$cases,
					array(
						$d['DataInProgress']['CaseNam'],
						$d['DataInProgress']['CaseNum'],
						$d['DataInProgress']['ChargeDate'],
						$d['DataInProgress']['LaborTraf'],
						$d['DataInProgress']['AdultSexTraf'],
						$d['DataInProgress']['MinorSexTraf'],
						$d['DataInProgress']['NumDef'],
						$d['DataInProgress']['State'],
						$d['DataInProgress']['FedDistrictLoc'],
						$d['DataInProgress']['FedDistrictNum'],
						$d['DataInProgress']['CaseSummary'],
						$d['DataInProgress']['JudgeName'],
						$d['DataInProgress']['JudgeRace'],
						$d['DataInProgress']['JudgeGen'],
						$d['DataInProgress']['JudgeTenure'],
						$d['DataInProgress']['JudgeApptBy'],
						array(
							array(
								$d['DataInProgress']['DefLast'],
								$d['DataInProgress']['DefFirst'],
								$d['DataInProgress']['Alias'],
								$d['DataInProgress']['DefGender'],
								$d['DataInProgress']['DefRace'],
								$d['DataInProgress']['DefBirthdate'],
								$d['DataInProgress']['DefArrestAge'],
								array(
									$d['DataInProgress']['ChargeDate'],
									$d['DataInProgress']['ArrestDate'],
									$d['DataInProgress']['Detained'],
									$d['DataInProgress']['BailType'],
									$d['DataInProgress']['BailAmount'],
									$d['DataInProgress']['Role'],
									$d['DataInProgress']['FelCharged'],
									$d['DataInProgress']['FelSentenced'],
									$d['DataInProgress']['DateTerm'],
									$d['DataInProgress']['SentDate'],
									$d['DataInProgress']['TotalSentence'],
									$d['DataInProgress']['Restitution'],
									$d['DataInProgress']['AssetForfeit'],
									$d['DataInProgress']['Appeal'],
									$d['DataInProgress']['SupRelease'],
									$d['DataInProgress']['Probation'],
									$charges
								),
								array(
									$d['DataInProgress']['NumVic'],
									$d['DataInProgress']['NumVicMinor'],
									$d['DataInProgress']['NumVicForeign'],
									$d['DataInProgress']['NumVicFemale']
								),
								array(
									$d['DataInProgress']['OCName1'],
									$d['DataInProgress']['OCType1'],
									$d['DataInProgress']['OCRace1'],
									$d['DataInProgress']['OCScope1'],
									$d['DataInProgress']['OCName2'],
									$d['DataInProgress']['OCType2'],
									$d['DataInProgress']['OCRace2'],
									$d['DataInProgress']['OCScope2']
								)
							)
						)
					)
				);
			} else {
				array_push(
					$cases[count($cases) - 1][16],
					array(
						$d['DataInProgress']['DefLast'],
						$d['DataInProgress']['DefFirst'],
						$d['DataInProgress']['Alias'],
						$d['DataInProgress']['DefGender'],
						$d['DataInProgress']['DefRace'],
						$d['DataInProgress']['DefBirthdate'],
						$d['DataInProgress']['DefArrestAge'],
						array(
							$d['DataInProgress']['ChargeDate'],
							$d['DataInProgress']['ArrestDate'],
							$d['DataInProgress']['Detained'],
							$d['DataInProgress']['BailType'],
							$d['DataInProgress']['BailAmount'],
							$d['DataInProgress']['Role'],
							$d['DataInProgress']['FelCharged'],
							$d['DataInProgress']['FelSentenced'],
							$d['DataInProgress']['DateTerm'],
							$d['DataInProgress']['SentDate'],
							$d['DataInProgress']['TotalSentence'],
							$d['DataInProgress']['Restitution'],
							$d['DataInProgress']['AssetForfeit'],
							$d['DataInProgress']['Appeal'],
							$d['DataInProgress']['SupRelease'],
							$d['DataInProgress']['Probation'],
							$charges
						),
						array(
							$d['DataInProgress']['NumVic'],
							$d['DataInProgress']['NumVicMinor'],
							$d['DataInProgress']['NumVicForeign'],
							$d['DataInProgress']['NumVicFemale']
						),
						array(
							array(
								$d['DataInProgress']['OCName1'],
								$d['DataInProgress']['OCType1'],
								$d['DataInProgress']['OCRace1'],
								$d['DataInProgress']['OCScope1']
							),
							array(
								$d['DataInProgress']['OCName2'],
								$d['DataInProgress']['OCType2'],
								$d['DataInProgress']['OCRace2'],
								$d['DataInProgress']['OCScope2']
							)
						)
					)
				);
			}
		}

		$this->set('display', $display);
		$this->set('cases', $cases);
		$this->set('datum', $datum);
		$this->render('home');
	}
}