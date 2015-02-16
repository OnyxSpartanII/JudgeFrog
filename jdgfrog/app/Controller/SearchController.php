<?php

class SearchController extends AppController {
	
	public $uses = array('Datum','DataInProgress');

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

		if (!$this->request->data['Datum']['case_Adult'] || !$this->request->data['Datum']['case_Minor'] || !$this->request->data['Datum']['case_Labor']) {
			
			$conditions['Datum.LaborTraf'] = $this->request->data['Datum']['case_Labor'];
			$conditions['Datum.AdultSexTraf'] = $this->request->data['Datum']['case_Adult'];
			$conditions['Datum.MinorSexTraf'] = $this->request->data['Datum']['case_Minor'];
		}		

		/**
		 * Case filter section
		 */

		if ($this->request->data['Datum']['case_Name'] != '') {
			$conditions['Datum.CaseNam'] = $this->request->data['Datum']['case_Name'];
		}

		if ($this->request->data['Datum']['case_Number'] != '') {
			$conditions['Datum.CaseNum'] = $this->request->data['Datum']['case_Number'];
		}

		if ($this->request->data['Datum']['case_NumDef'] != '0;100') {
			$min = explode(';', $this->request->data['Datum']['case_NumDef'])[0];
			$max = explode(';', $this->request->data['Datum']['case_NumDef'])[1];
			$conditions['Datum.NumDef >='] = $min;
			$conditions['Datum.NumDef <='] = $max;
		}

		if ($this->request->data['Datum']['case_State'] != '') {
			$conditions['Datum.State'] = $this->request->data['Datum']['case_State'];
		}

		if ($this->request->data['Datum']['case_FedDist'] != 0) {
			$conditions['Datum.FedDistrictNum'] = $this->request->data['Datum']['case_FedDist'];
		}

		/**
		 * Defendant filter section
		 */

		if ($this->request->data['Datum']['defendant_Name'] != '') {
			$conditions['Datum.DefLast'] = $this->request->data['Datum']['defendant_Name'];
			$display['defendant'] = true;
		}

		if ($this->request->data['Datum']['defendant_Gender'] != '') {
			$conditions['Datum.DefGender'] = $this->request->data['Datum']['defendant_Gender'];
			$display['defendant'] = true;
		}

		if ($this->request->data['Datum']['defendant_Race'] != '') {
			$conditions['Datum.DefRace'] = $this->request->data['Datum']['defendant_Race'];
			$display['defendant'] = true;
		}
		

		if ($this->request->data['Datum']['defendant_YOB'] != '1930;2014') {
			$conditions['Datum.DefBirthdate >='] = explode(';',$this->request->data['Datum']['defendant_YOB'])[0];
			$conditions['Datum.DefBirthdate <='] = explode(';',$this->request->data['Datum']['defendant_YOB'])[1];
			$display['defendant'] = true;
		}

		/**
		 * Judge filter section
		 */

		if ($this->request->data['Datum']['judge_Name'] != '') {
			$conditions['Datum.JudgeName'] = $this->request->data['Datum']['judge_Name'];
			$display['judge'] = true;
		}

		if ($this->request->data['Datum']['judge_Race'] != '') {
			$conditions['Datum.JudgeRace'] = $this->request->data['Datum']['judge_Race'];
			$display['judge'] = true;
		}

		if ($this->request->data['Datum']['judge_Gender'] != '') {
			$conditions['Datum.JudgeGen'] = $this->request->data['Datum']['judge_Gender'];
			$display['judge'] = true;
		}

		if ($this->request->data['Datum']['judge_ApptBy'] != '') {
			$conditions['Datum.JudgeApptBy'] = $this->request->data['Datum']['judge_ApptBy'];
			$display['judge'] = true;
		}

		if ($this->request->data['Datum']['judge_YearApp'] != '1960;2020') {
			$conditions['Datum.JudgeTenure >='] = explode(';',$this->request->data['Datum']['judge_YearApp'])[0];
			$conditions['Datum.JudgeTenure <='] = explode(';',$this->request->data['Datum']['judge_YearApp'])[1];
			$display['judge'] = true;
		}

		/**
		 * Victims filter section
		 */

		if ($this->request->data['Datum']['victims_Total'] != '0;100') {
			$conditions['Datum.NumVic >='] = explode(';',$this->request->data['Datum']['victims_Total'])[0];
			$conditions['Datum.NumVic <='] = explode(';',$this->request->data['Datum']['victims_Total'])[1];
			$display['victims'] = true;
		}

		if ($this->request->data['Datum']['victims_Minor'] != '0;100') {
			$conditions['Datum.NumVicMinor >='] = explode(';',$this->request->data['Datum']['victims_Minor'])[0];
			$conditions['Datum.NumVicMinor <='] = explode(';',$this->request->data['Datum']['victims_Minor'])[1];
			$display['victims'] = true;
		}

		if ($this->request->data['Datum']['victims_Foreign'] != '0;100') {
			$conditions['Datum.NumVicForeign >='] = explode(';',$this->request->data['Datum']['victims_Foreign'])[0];
			$conditions['Datum.NumVicForeign <='] = explode(';',$this->request->data['Datum']['victims_Foreign'])[1];
			$display['victims'] = true;
		}

		if ($this->request->data['Datum']['victims_Female'] != '0;100') {
			$conditions['Datum.NumVicFemale >='] = explode(';',$this->request->data['Datum']['victims_Female'])[0];
			$conditions['Datum.NumVicFemale <='] = explode(';',$this->request->data['Datum']['victims_Female'])[1];
			$display['victims'] = true;
		}

		/**
		 * ArrestChargeDetails filter section
		 */

		if ($this->request->data['Datum']['ad_DateArrest'] != '2000;2020') {
			$conditions['Datum.ArrestDate >='] = explode(';',$this->request->data['Datum']['ad_DateArrest'])[0];
			$conditions['Datum.ArrestDate <='] = explode(';',$this->request->data['Datum']['ad_DateArrest'])[1];
			$display['acd'] = true;
		}

		if ($this->request->data['Datum']['ad_Role'] != '') {
			$conditions['Datum.Role'] = $this->request->data['Datum']['ad_Role'];
			$display['acd'] = true;
		}

		if ($this->request->data['Datum']['ad_BailType'] != '') {
			$conditions['Datum.BailType'] = $this->request->data['Datum']['ad_BailType'];
			$display['acd'] = true;
		}

		if ($this->request->data['Datum']['ad_BailAmount'] != '1000;100000') {	
			$conditions['Datum.BailAmount >='] = explode(';',$this->request->data['Datum']['ad_BailAmount'])[0];
			$conditions['Datum.BailAmount <='] = explode(';',$this->request->data['Datum']['ad_BailAmount'])[1];
			$display['acd'] = true;
		}

		/* CD */
		if ($this->request->data['Datum']['cd_Date'] != '2000;2020') {	
			$conditions['Datum.ChargeDate >='] = explode(';',$this->request->data['Datum']['cd_Date'])[0];
			$conditions['Datum.ChargeDate <='] = explode(';',$this->request->data['Datum']['cd_Date'])[1];
			$display['acd'] = true;
		}

		if ($this->request->data['Datum']['cd_TtlCharges'] != '0;20') {	
			$conditions['Datum.FelCharged >='] = explode(';',$this->request->data['Datum']['cd_TtlCharges'])[0];
			$conditions['Datum.FelCharged <='] = explode(';',$this->request->data['Datum']['cd_TtlCharges'])[1];
			$display['acd'] = true;
		}

		/**
		 * Sentence filter section
		 */

		if ($this->request->data['Datum']['sd_TtlFelonies'] != '0;10') {
			$conditions['Datum.FelSentenced >='] = explode(';',$this->request->data['Datum']['sd_TtlFelonies'])[0];
			$conditions['Datum.FelSentenced <='] = explode(';',$this->request->data['Datum']['sd_TtlFelonies'])[1];
			$display['sentence'] = true;
		}

		if ($this->request->data['Datum']['sd_DateTerminated'] != '2000;2020') {
			$conditions['Datum.DateTerm >='] = explode(';',$this->request->data['Datum']['sd_TtlFelonies'])[0];
			$conditions['Datum.DateTerm <='] = explode(';',$this->request->data['Datum']['sd_TtlFelonies'])[1];
			$display['sentence'] = true;
		}

		if ($this->request->data['Datum']['sd_TtlMonths'] != '0;300') {
			$conditions['Datum.TotalSentence >='] = explode(';',$this->request->data['Datum']['sd_TtlMonths'])[0];
			$conditions['Datum.TotalSentence <='] = explode(';',$this->request->data['Datum']['sd_TtlMonths'])[1];
			$display['sentence'] = true;
		}

		if ($this->request->data['Datum']['sd_Restitution'] != '0;10000000') {
			$conditions['Datum.Restitution >='] = explode(';',$this->request->data['Datum']['sd_Restitution'])[0];
			$conditions['Datum.Restitution <='] = explode(';',$this->request->data['Datum']['sd_Restitution'])[1];
			$display['sentence'] = true;
		}

		if ($this->request->data['Datum']['sd_AssetForfeit'] != '') {
			$conditions['Datum.AssetForfeit'] = $this->request->data['Datum']['sd_AssetForfeit'];
			$display['sentence'] = true;
		}

		if ($this->request->data['Datum']['sd_Appeal'] != '') {
			$conditions['Datum.Appeal'] = $this->request->data['Datum']['sd_Appeal'];
			$display['sentence'] = true;
		}

		if ($this->request->data['Datum']['sd_MonthsProb'] != '0;50') {
			$conditions['Datum.Probation >='] = explode(';',$this->request->data['Datum']['sd_MonthsProb'])[0];
			$conditions['Datum.Probation <='] = explode(';',$this->request->data['Datum']['sd_MonthsProb'])[1];
			$display['sentence'] = true;
		}

		$conditions = array();

		$datum = $this->Datum->find('all', array('conditions' => $conditions));

		print_r($datum);

		$conditions = array();

		/**
		 * OrganizedCrimeGroup filter section
		 */

		if ($this->request->data['Datum']['ocg_Name'] != '') {
			$conditions['OCGName'] = $this->request->data['Datum']['ocg_Name'];
			$display['ocg'] = true;
		}

		if ($this->request->data['Datum']['ocg_Type'] != '') {
			$conditions['OCGType'] = $this->request->data['Datum']['ocg_Type'];
			$display['ocg'] = true;
		}

		if ($this->request->data['Datum']['ocg_Scope'] != '') {
			$conditions['OCGScope'] = $this->request->data['Datum']['ocg_Scope'];
			$display['ocg'] = true;
		}

		if ($this->request->data['Datum']['ocg_Race'] != '') {
			$conditions['OCGRace'] = $this->request->data['Datum']['ocg_Race'];
			$display['ocg'] = true;
		}

		// charge
		if ($this->request->data['Datum']['cd_Counts'] != '0;10') {	
			$conditions['Counts'] = $this->request->data['Datum']['cd_Counts'];
			echo isset($conditions['Counts']);
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['Datum']['cd_CountsNP'] != '0;10') {	
			$conditions['CountsNP'] = $this->request->data['Datum']['cd_CountsNP'];
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['Datum']['cd_PleaDismiss'] != '0;10') {
			$conditions['PleaDismissed'] = $this->request->data['Datum']['cd_PleaDismiss'];
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['Datum']['cd_PleaGuilty'] != '0;10') {	
			$conditions['PleaGuilty'] = $this->request->data['Datum']['cd_PleaGuilty'];
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['Datum']['cd_TrialGuilty'] != '0;10') {	
			$conditions['TrialGuilty'] = $this->request->data['Datum']['cd_TrialGuilty'];
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['Datum']['cd_TrialNotGuilty'] != '0;10') {	
			$conditions['TrialNG'] = $this->request->data['Datum']['cd_TrialNotGuilty'];
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['Datum']['cd_Sentence'] != '0;300') {	
			$conditions['Sentence'] = $this->request->data['Datum']['cd_Sentence'];
			$display['cd'] = true;
		}

		// charge
		if ($this->request->data['Datum']['cd_Probation'] != '0;300') {	
			$conditions['Prob'] = $this->request->data['Datum']['cd_Probation'];
			$display['cd'] = true;
		}

		$conditions = array();
		$display = array('judge' => false, 'defendant' => false, 'acd' => false, 'sentence' => false, 'ocg' => false, 'victims' => false, 'cd' => false);

		foreach ($datum as &$data) {
			if ($display['ocg']) {
				if (isset($conditions['OCGName']) && ($data['Datum']['OCGName1'] != $conditions['OCGName'] && $data['Datum']['OCGName2'] != $conditions['OCGName'])) {
					unset($data);
					continue;
				}
				if (isset($conditions['OCGType']) && ($data['Datum']['OCGType1'] != $conditions['OCGType'] && $data['Datum']['OCGType2'] != $conditions['OCGType'])) {
					unset($data);
					continue;
				}
				if (isset($conditions['OCGScope']) && ($data['Datum']['OCGScope1'] != $conditions['OCGScope'] && $data['Datum']['OCGScope2'] != $conditions['OCGScope'])) {
					unset($data);
					continue;
				}
				if (isset($conditions['OCGRace']) && ($data['Datum']['OCGRace1'] != $conditions['OCGRace'] && $data['Datum']['OCGRace2'] != $conditions['OCGRace'])) {
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

		$statutes = preg_grep("/^\d{4}(to\d{4})?$/", array_keys($datum[0]['Datum']));
		$cases = array();
		$case_name = '';

		foreach ($datum as $d) {
			if (strcmp($d['Datum']['CaseNam'], $case_name) != 0) {
				$charges = array();
				foreach ($statutes as $statute) {
					if ($d['Datum'][$statute] != 0) {
						array_push(
							$charges,
							array(
								$statute,
								$d['Datum']["Counts$statute"],
								$d['Datum']["CountsNP$statute"],
								$d['Datum']["PleaDismissed$statute"],
								$d['Datum']["PleaGuilty$statute"],
								$d['Datum']["TrialGuilty$statute"],
								$d['Datum']["TrialNG$statute"],
								$d['Datum']["Fines$statute"],
								$d['Datum']["Sent$statute"],
								$d['Datum']["Prob$statute"]
							)
						);
					}
				}
				$case_name = $d['Datum']['CaseNam'];
				array_push(
					$cases,
					array(
						$d['Datum']['CaseNam'],
						$d['Datum']['CaseNum'],
						$d['Datum']['ChargeDate'],
						$d['Datum']['LaborTraf'],
						$d['Datum']['AdultSexTraf'],
						$d['Datum']['MinorSexTraf'],
						$d['Datum']['NumDef'],
						$d['Datum']['State'],
						$d['Datum']['FedDistricLoc'],
						$d['Datum']['FedDistrictNum'],
						$d['Datum']['CaseSummary'],
						$d['Datum']['JudgeName'],
						$d['Datum']['JudgeRace'],
						$d['Datum']['JudgeGen'],
						$d['Datum']['JudgeTenure'],
						$d['Datum']['JudgeApptBy'],
						array(
							array(
								$d['Datum']['DefLast'],
								$d['Datum']['DefFirst'],
								$d['Datum']['Alias'],
								$d['Datum']['DefGender'],
								$d['Datum']['DefRace'],
								$d['Datum']['DefBirthdate'],
								$d['Datum']['DefArrestAge'],
								array(
									$d['Datum']['ChargeDate'],
									$d['Datum']['ArrestDate'],
									$d['Datum']['Detained'],
									$d['Datum']['BailType'],
									$d['Datum']['BailAmount'],
									$d['Datum']['Role'],
									$d['Datum']['FelCharged'],
									$d['Datum']['FelSentenced'],
									$d['Datum']['DateTerm'],
									$d['Datum']['SentDate'],
									$d['Datum']['TotalSentence'],
									$d['Datum']['Restitution'],
									$d['Datum']['AssetForfeit'],
									$d['Datum']['Appeal'],
									$d['Datum']['SupRelease'],
									$d['Datum']['Probation'],
									$charges
								),
								array(
									$d['Datum']['NumVic'],
									$d['Datum']['NumVicMinor'],
									$d['Datum']['NumVicForeign'],
									$d['Datum']['NumVicFemale']
								),
								array(
									$d['Datum']['OCGName1'],
									$d['Datum']['OCGType1'],
									$d['Datum']['OCGRace1'],
									$d['Datum']['OCGScope1'],
									$d['Datum']['OCGName2'],
									$d['Datum']['OCGType2'],
									$d['Datum']['OCGRace2'],
									$d['Datum']['OCGScope2']
								)
							)
						)
					)
				);
			} else {
				array_push(
					$cases[count($cases) - 1][16],
					array(
						$d['Datum']['DefLast'],
						$d['Datum']['DefFirst'],
						$d['Datum']['Alias'],
						$d['Datum']['DefGender'],
						$d['Datum']['DefRace'],
						$d['Datum']['DefBirthdate'],
						$d['Datum']['DefArrestAge'],
						array(
							$d['Datum']['ChargeDate'],
							$d['Datum']['ArrestDate'],
							$d['Datum']['Detained'],
							$d['Datum']['BailType'],
							$d['Datum']['BailAmount'],
							$d['Datum']['Role'],
							$d['Datum']['FelCharged'],
							$d['Datum']['FelSentenced'],
							$d['Datum']['DateTerm'],
							$d['Datum']['SentDate'],
							$d['Datum']['TotalSentence'],
							$d['Datum']['Restitution'],
							$d['Datum']['AssetForfeit'],
							$d['Datum']['Appeal'],
							$d['Datum']['SupRelease'],
							$d['Datum']['Probation'],
							$charges
						),
						array(
							$d['Datum']['NumVic'],
							$d['Datum']['NumVicMinor'],
							$d['Datum']['NumVicForeign'],
							$d['Datum']['NumVicFemale']
						),
						array(
							array(
								$d['Datum']['OCName1'],
								$d['Datum']['OCType1'],
								$d['Datum']['OCRace1'],
								$d['Datum']['OCScope1']
							),
							array(
								$d['Datum']['OCName2'],
								$d['Datum']['OCType2'],
								$d['Datum']['OCRace2'],
								$d['Datum']['OCScope2']
							)
						)
					)
				);
			}
		}

		print_r($display);
		echo "\n<br/>Cases:<br/>";
		print_r($cases);
		echo "\n<br/>";
		$this->set('display', $display);
		$this->set('cases', $cases);
		$this->set('datum', $datum);
		$this->render('home');
	}
}