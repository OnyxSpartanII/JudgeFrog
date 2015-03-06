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
		$statutes = ['1916to1968', '1028', '1351', '1425', '1426',
					'1461to1465', '1512', '1542to1543', '1546',
					'1581to1588', '1589', '1590', '1591', '1592',
					'2251', '2252', '2260', '2421to2424', '1324',
					'1328'];


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
			$conditions['DataInProgress.DefFirst'] = explode(", ", $this->request->data['DataInProgress']['defendant_Name'])[1];
			$conditions['DataInProgress.DefLast'] = explode(", ", $this->request->data['DataInProgress']['defendant_Name'])[0];
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

		/**
		 * OrganizedCrimeGroup filter section
		 */

		$ocg_conds = array();

		if ($this->request->data['DataInProgress']['ocg_Name'] != '') {
			array_push($ocg_conds, array(
					'OR' => array(
						array('OCName1' => $this->request->data['DataInProgress']['ocg_Name']),
						array('OCName2' => $this->request->data['DataInProgress']['ocg_Name'])
					)
				)
			);
			$display['ocg'] = true;
		}

		if ($this->request->data['DataInProgress']['ocg_Type'] != '') {
			array_push($ocg_conds, array(
					'OR' => array(
						array('OCType1' => ($this->request->data['DataInProgress']['ocg_Type'] + 1)),
						array('OCType2' => ($this->request->data['DataInProgress']['ocg_Type'] + 1))
					)
				)
			);
			$display['ocg'] = true;
		}

		if ($this->request->data['DataInProgress']['ocg_Scope'] != '') {
			array_push($ocg_conds, array(
					'OR' => array(
						array('OCScope1' => ($this->request->data['DataInProgress']['ocg_Scope'] + 1)),
						array('OCScope2' => ($this->request->data['DataInProgress']['ocg_Scope'] + 1))
					)
				)
			);
			$display['ocg'] = true;
		}

		if ($this->request->data['DataInProgress']['ocg_Race'] != '') {
			array_push($ocg_conds, array(
					'OR' => array(
						array('OCRace1' => ($this->request->data['DataInProgress']['ocg_Race'] + 1)),
						array('OCRace2' => ($this->request->data['DataInProgress']['ocg_Race'] + 1))
					)
				)
			);
			$display['ocg'] = true;
		}

		if ($display['ocg']) array_push($conditions, $ocg_conds);

		/**
		 * Charge filter
		 */

		$charge_conds = array();

		// charge
		if ($this->request->data['DataInProgress']['cd_Counts'] != '0;10') {
			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				array_push($conds['OR'], array(
					"Counts$stat >=" => explode(';', $this->request->data['DataInProgress']['cd_Counts'])[0],
					"Counts$stat <=" => explode(';', $this->request->data['DataInProgress']['cd_Counts'])[1],
					)
				);
			}
			array_push($charge_conds, $conds);
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_CountsNP'] != '0;10') {	
			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				array_push($conds['OR'], array(
					"CountsNP$stat >=" => explode(';', $this->request->data['DataInProgress']['cd_CountsNP'])[0],
					"CountsNP$stat <=" => explode(';', $this->request->data['DataInProgress']['cd_CountsNP'])[1],
					)
				);
			}
			array_push($charge_conds, $conds);
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_PleaDismiss'] != '0;10') {
			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				array_push($conds['OR'], array(
					"PleaDismiss$stat >=" => explode(';', $this->request->data['DataInProgress']['cd_PleaDismiss'])[0],
					"PleaDismiss$stat <=" => explode(';', $this->request->data['DataInProgress']['cd_PleaDismiss'])[1],
					)
				);
			}
			array_push($charge_conds, $conds);
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_PleaGuilty'] != '0;10') {	
			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				array_push($conds['OR'], array(
					"PleaGuilty$stat >=" => explode(';', $this->request->data['DataInProgress']['cd_PleaGuilty'])[0],
					"PleaGuilty$stat <=" => explode(';', $this->request->data['DataInProgress']['cd_PleaGuilty'])[1],
					)
				);
			}
			array_push($charge_conds, $conds);
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_TrialGuilty'] != '0;10') {	
			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				array_push($conds['OR'], array(
					"TrialGuilty$stat >=" => explode(';', $this->request->data['DataInProgress']['cd_TrialGuilty'])[0],
					"TrialGuilty$stat <=" => explode(';', $this->request->data['DataInProgress']['cd_TrialGuilty'])[1],
					)
				);
			}
			array_push($charge_conds, $conds);
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_TrialNotGuilty'] != '0;10') {	
			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				array_push($conds['OR'], array(
					"TrialNotGuilty$stat >=" => explode(';', $this->request->data['DataInProgress']['cd_TrialNotGuilty'])[0],
					"TrialNotGuilty$stat <=" => explode(';', $this->request->data['DataInProgress']['cd_TrialNotGuilty'])[1],
					)
				);
			}
			array_push($charge_conds, $conds);
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_Sentence'] != '0;300') {	
			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				array_push($conds['OR'], array(
					"Sent$stat >=" => explode(';', $this->request->data['DataInProgress']['cd_Sentence'])[0],
					"Sent$stat <=" => explode(';', $this->request->data['DataInProgress']['cd_Sentence'])[1],
					)
				);
			}
			array_push($charge_conds, $conds);
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_Probation'] != '0;300') {	
			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				array_push($conds['OR'], array(
					"Prob$stat >=" => explode(';', $this->request->data['DataInProgress']['cd_Probation'])[0],
					"Prob$stat <=" => explode(';', $this->request->data['DataInProgress']['cd_Probation'])[1],
					)
				);
			}
			array_push($charge_conds, $conds);
			$display['cd'] = true;
		}

		if ($display['cd']) array_push($conditions, $charge_conds);

		$case_nums = $this->DataInProgress->find('all', array('conditions' => $conditions, 'fields' => array('DataInProgress.CaseNum')));
		//print_r($case_names);
		$cn = array();
		foreach ($case_nums as $case_num) {
			array_push($cn, $case_num['DataInProgress']['CaseNum']);
		}
		$datum = $this->DataInProgress->find('all', array('conditions' => array('DataInProgress.CaseNum' => $cn)));
		$cases = array();
		$case_name = '';

		foreach ($datum as $d) {

			$ocg_filter = false;
			$def_filter = false;
			$cd_filter = false;

			if ($display['defendant']) {
				$def_filter = true;
				if (isset($conditions['DataInProgress.DefFirst']) && ($d['DataInProgress']['DefFirst'] != $conditions['DataInProgress.DefFirst'])) {
					$def_filter = false;
				}
				if (isset($conditions['DataInProgress.DefLast']) && ($d['DataInProgress']['DefLast'] != $conditions['DataInProgress.DefLast'])) {
					$def_filter = false;
				}
				if (isset($conditions['DataInProgress.DefRace']) && ($d['DataInProgress']['DefRace'] != $conditions['DataInProgress.DefRace'])) {
					$def_filter = false;
				}
				if (isset($conditions['DataInProgress.DefBirthdate >=']) && ($d['DataInProgress']['DefBirthdate'] >= $conditions['DataInProgress.DefBirthdate >=']) && ($d['DataInProgress']['DefBirthdate'] <= $conditions['DataInProgress.DefBirthdate <='])) {
					$def_filter = false;
				}
				if (isset($conditions['DataInProgress.DefGender']) && ($d['DataInProgress']['DefGender'] != $conditions['DataInProgress.DefGender'])) {
					$def_filter = false;
				}
			}

			if ($display['ocg']) {
				$def_filter = true;
				$ocg_filter = true;
				if (isset($conditions['OCName']) && ($d['DataInProgress']['OCName1'] != $conditions['OCName'] && $d['DataInProgress']['OCName2'] != $conditions['OCName'])) {
					$ocg_filter = false;
				}
				if (isset($conditions['OCType']) && ($d['DataInProgress']['OCType1'] != $conditions['OCType'] && $d['DataInProgress']['OCType2'] != $conditions['OCType'])) {
					$ocg_filter = false;
				}
				if (isset($conditions['OCScope']) && ($d['DataInProgress']['OCScope1'] != $conditions['OCScope'] && $d['DataInProgress']['OCScope2'] != $conditions['OCScope'])) {
					$ocg_filter = false;
				}
				if (isset($conditions['OCRace']) && ($d['DataInProgress']['OCRace1'] != $conditions['OCRace'] && $d['DataInProgress']['OCRace2'] != $conditions['OCRace'])) {
					$ocg_filter = false;
				}
			}

			$charges = array();
			foreach ($statutes as $statute) {
				if ($display['cd']) {
					$def_filter = true;
					$cd_filter = true;
					if ($d['DataInProgress'][$statute] != 0) {
						if (isset($conditions['Counts']) && isset($d['DataInProgress']["Counts$statute"])) {
							$min = explode(';', $conditions['Counts'])[0];
							$max = explode(';', $conditions['Counts'])[1];
							if (!(intval($d['DataInProgress']["Counts$statute"]) >= $min || intval($d['DataInProgress']["Counts$statute"]) >= $max)) {
								$cd_filter = false;
							}
						}

						if (isset($conditions['CountsNP']) && isset($d['DataInProgress']["CountsNP$statute"])) {
							$min = explode(';', $conditions['CountsNP'])[0];
							$max = explode(";", $conditions["CountsNP"])[1];
							if (!(intval($d['DataInProgress']["CountsNP$statute"]) >= $max || intval($d['DataInProgress']["CountsNP$statute"]) <= $min)) {	
								$cd_filter = false;
							}
						}

						if (isset($conditions["PleaDismissed"]) && isset($d['DataInProgress']["PleaDismissed$statute"])) {
							$min = explode(";", $conditions["PleaDismissed"])[0];
							$max = explode(";", $conditions["PleaDismissed"])[1];
							if (!(intval($d['DataInProgress']["PleaDismissed$statute"]) >= $max || intval($d['DataInProgress']["PleaDismissed$statute"]) <= $min)) {
								$cd_filter = false;
							}
						}

						if (isset($conditions["PleaGuilty"]) && isset($d['DataInProgress']["PleaGuilty$statute"])) {
							$min = explode(";", $conditions["PleaGuilty"])[0];
							$max = explode(";", $conditions["PleaGuilty"])[1];
							if (!(intval($d['DataInProgress']["PleaGuilty$statute"]) >= $max || intval($d['DataInProgress']["PleaGuilty$statute"]) <= $min)) {
								$cd_filter = false;
							}
						}

						if (isset($conditions["TrialGuilty"]) && isset($d['DataInProgress']["TrialGuilty$statute"])) {
							$min = explode(";", $conditions["TrialGuilty"])[0];
							$max = explode(";", $conditions["TrialGuilty"])[1];
							if (!(intval($d['DataInProgress']["TrialGuilty$statute"]) >= $max || intval($d['DataInProgress']["TrialGuilty$statute"]) <= $min)) {
								$cd_filter = false;
							}
						}

						if (isset($conditions["TrialNG"]) && isset($d['DataInProgress']["TrialNG$statute"])) {
							$min = explode(";", $conditions["TrialNG"])[0];
							$max = explode(";", $conditions["TrialNG"])[1];
							if (!(intval($d['DataInProgress']["TrialNG$statute"]) >= $max || intval($d['DataInProgress']["TrialNG$statute"]) <= $min)) {
								$cd_filter = false;
							}
						}

						if (isset($conditions["Sentence"]) && isset($d['DataInProgress']["Sent$statute"])) {
							$min = explode(";", $conditions["Sentence"])[0];
							$max = explode(";", $conditions["Sentence"])[1];
							if (!(intval($d['DataInProgress']["Sent$statute"]) >= $max || intval($d['DataInProgress']["Sent$statute"]) <= $min)) {
								$cd_filter = false;
							}
						}

						if (isset($conditions['Prob']) && isset($d['DataInProgress']["Prob$statute"])) {
							$min = explode(';', $conditions['Prob'])[0];
							$max = explode(';', $conditions['Prob'])[1];
							if (!(intval($d['DataInProgress']["Prob$statute"]) >= $max || intval($d['DataInProgress']["Prob$statute"]) <= $min)) {
								$cd_filter = false;
							}
						}
					}
				}

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
							$d['DataInProgress']["Prob$statute"],
							$cd_filter
						)
					);
				}
			}

			if ($def_filter) {
				$display['defendant'] = true;
			}

			if (strcmp($d['DataInProgress']['CaseNam'], $case_name) != 0) {
				$case_name = $d['DataInProgress']['CaseNam'];
				array_push(
					$cases,
					array(
						$d['DataInProgress']['CaseNam'],			// 0
						$d['DataInProgress']['CaseNum'],
						$d['DataInProgress']['ChargeDate'],
						$d['DataInProgress']['LaborTraf'],
						$d['DataInProgress']['AdultSexTraf'],
						$d['DataInProgress']['MinorSexTraf'],		// 5
						$d['DataInProgress']['NumDef'],
						$d['DataInProgress']['State'],
						$d['DataInProgress']['FedDistrictLoc'],
						$d['DataInProgress']['FedDistrictNum'],
						$d['DataInProgress']['CaseSummary'],		// 10
						$d['DataInProgress']['JudgeName'],
						$d['DataInProgress']['JudgeRace'],
						$d['DataInProgress']['JudgeGen'],
						$d['DataInProgress']['JudgeTenure'],
						$d['DataInProgress']['JudgeApptBy'],		// 15
						$d['DataInProgress']['NumVic'],
						$d['DataInProgress']['NumVicMinor'],
						$d['DataInProgress']['NumVicForeign'],
						$d['DataInProgress']['NumVicFemale'],
						array(										// 20
							array(
								$d['DataInProgress']['DefLast'],		// 0
								$d['DataInProgress']['DefFirst'],
								$d['DataInProgress']['Alias'],
								$d['DataInProgress']['DefGender'],
								$d['DataInProgress']['DefRace'],
								$d['DataInProgress']['DefBirthdate'],	// 5
								$d['DataInProgress']['DefArrestAge'],
								$d['DataInProgress']['ChargeDate'],
								$d['DataInProgress']['ArrestDate'],
								$d['DataInProgress']['Detained'],
								$d['DataInProgress']['BailType'],		// 10
								$d['DataInProgress']['BailAmount'],
								$d['DataInProgress']['Role'],
								$d['DataInProgress']['FelCharged'],
								$d['DataInProgress']['FelSentenced'],
								$d['DataInProgress']['DateTerm'],		// 15
								$d['DataInProgress']['SentDate'],
								$d['DataInProgress']['TotalSentence'],
								$d['DataInProgress']['Restitution'],
								$d['DataInProgress']['AssetForfeit'],
								$d['DataInProgress']['Appeal'],			// 20
								$d['DataInProgress']['SupRelease'],
								$d['DataInProgress']['Probation'],
								$charges,
								$d['DataInProgress']['OCName1'],
								$d['DataInProgress']['OCType1'],		// 25
								$d['DataInProgress']['OCRace1'],
								$d['DataInProgress']['OCScope1'],
								$d['DataInProgress']['OCName2'],
								$d['DataInProgress']['OCType2'],
								$d['DataInProgress']['OCRace2'],		// 30
								$d['DataInProgress']['OCScope2'],
								$def_filter,
								$ocg_filter
							)
						)
					)
				);
		
				// if ($display['defendant']) {
				// 	$conds = array('DataInProgress.CaseNam' => $case_name);
				// 	$defs = $this->DataInProgress->find('all', array('conditions' => $conds));
				// 	foreach($defs as $def) {
				// 		foreach($cases[count($cases) - 1][20] as $old_def) {
				// 			if (strcmp($old_def[0], $def['DataInProgress']['DefLast']) != 0 ||
				// 				strcmp($old_def[1], $def['DataInProgress']['DefFirst']) != 0 ||
				// 				$old_def[5] != $def['DataInProgress']['DefBirthdate']) {

				// 				array_push(
				// 					$cases[count($cases) - 1][20],
				// 					array(
				// 						$def['DataInProgress']['DefLast'],
				// 						$def['DataInProgress']['DefFirst'],
				// 						$def['DataInProgress']['Alias'],
				// 						$def['DataInProgress']['DefGender'],
				// 						$def['DataInProgress']['DefRace'],
				// 						$def['DataInProgress']['DefBirthdate'],
				// 						$def['DataInProgress']['DefArrestAge'],
				// 						$def['DataInProgress']['ChargeDate'],
				// 						$def['DataInProgress']['ArrestDate'],
				// 						$def['DataInProgress']['Detained'],
				// 						$def['DataInProgress']['BailType'],
				// 						$def['DataInProgress']['BailAmount'],
				// 						$def['DataInProgress']['Role'],
				// 						$def['DataInProgress']['FelCharged'],
				// 						$def['DataInProgress']['FelSentenced'],
				// 						$def['DataInProgress']['DateTerm'],
				// 						$def['DataInProgress']['SentDate'],
				// 						$def['DataInProgress']['TotalSentence'],
				// 						$def['DataInProgress']['Restitution'],
				// 						$def['DataInProgress']['AssetForfeit'],
				// 						$def['DataInProgress']['Appeal'],
				// 						$def['DataInProgress']['SupRelease'],
				// 						$def['DataInProgress']['Probation'],
				// 						$charges,
				// 						$def['DataInProgress']['OCName1'],
				// 						$def['DataInProgress']['OCType1'],
				// 						$def['DataInProgress']['OCRace1'],
				// 						$def['DataInProgress']['OCScope1'],
				// 						$def['DataInProgress']['OCName2'],
				// 						$def['DataInProgress']['OCType2'],
				// 						$def['DataInProgress']['OCRace2'],
				// 						$def['DataInProgress']['OCScope2'],
				// 						false
				// 					)
				// 				);

				// 			}
				// 		}
				// 	}
				// }

			} else {
				array_push(
					$cases[count($cases) - 1][20],
					array(
						$d['DataInProgress']['DefLast'],
						$d['DataInProgress']['DefFirst'],
						$d['DataInProgress']['Alias'],
						$d['DataInProgress']['DefGender'],
						$d['DataInProgress']['DefRace'],
						$d['DataInProgress']['DefBirthdate'],
						$d['DataInProgress']['DefArrestAge'],
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
						$charges,
						$d['DataInProgress']['OCName1'],
						$d['DataInProgress']['OCType1'],
						$d['DataInProgress']['OCRace1'],
						$d['DataInProgress']['OCScope1'],
						$d['DataInProgress']['OCName2'],
						$d['DataInProgress']['OCType2'],
						$d['DataInProgress']['OCRace2'],
						$d['DataInProgress']['OCScope2'],
						$def_filter,
						$ocg_filter
					)
				);
			}
		}

		// print_r($cases);

		$this->set('display', $display);
		$this->set('cases', $cases);
		$this->set('datum', $datum);
		$this->render('home');
	}
}