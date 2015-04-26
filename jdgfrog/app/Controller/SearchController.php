<?php

class SearchController extends AppController {
	
	public $uses = array('Datum');

	public $helpers = array('Html', 'Form');

	/**
	 * Controller name
	 */
	public $name = 'Search';

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('home','update', 'autoComplete');
	}

	public function update() {
		$this->set('title', 'Database Search | Human Trafficking Data');
		$this->set('active', 'search');

		$display = array('case' => false, 'type' => false, 'judge' => false, 'defendant' => false, 'acd' => false, 'sentence' => false, 'ocg' => false, 'victims' => false, 'cd' => false);

		$statutes = ['1961to1968', '1028', '1351',
						'1425', '1512', '1546', '1581to1588', '1589',
						'1590', '1591', '1592', '2252', '2260', '2421to2424',
						'1324', '1328'];

		$statute_flag = false;

		$def_races = array('White','Black','Hispanic','Asian','Other','Other');
		$jdg_races= array('White', 'Black', 'Hispanic', 'Asian', 'Indian');
		$bail_types = array('None','Surety','Non-Surety');
		$ocg_types = array('','Mom & Pop','Street Gang','Cartel/Syndicate/Mafia','','Prison Gang','Other');
		$ocg_scopes = array('Other','Local Only','Trans-State','Trans-National');
		$ocg_races = array('None','Black','White','Hispanic','Asian','Other');
		/**
		 * Case type filter section
		 */
		
		$conditions = array();
		$query = array();

		if ($this->request->data['Datum']['case_Adult'] || $this->request->data['Datum']['case_Minor'] || $this->request->data['Datum']['case_Labor']) {
			
			$display['type'] = true;

			$adult = $this->request->data['Datum']['case_Adult'];
			$minor = $this->request->data['Datum']['case_Minor'];
			$labor = $this->request->data['Datum']['case_Labor'];

			switch ($this->request->data['Datum']['case_TypeOperator']) {
				case 0:
					$conditions['AND'] = array('Datum.LaborTraf' => $this->request->data['Datum']['case_Labor'],
												'Datum.AdultSexTraf' => $this->request->data['Datum']['case_Adult'],
												'Datum.MinorSexTraf' => $this->request->data['Datum']['case_Minor']);
					
					array_push($query, "<b>Case Type:</b> [AND] " . ($labor ? 'L' : '') . ($adult ? 'A' : '') . ($minor ? 'M' : ''));

					break;
				
				case 1:
					$conditions['OR'] = array();
					if ($labor) {
						$conditions['OR']['Datum.LaborTraf'] = $labor;
					}

					if ($adult) {
						$conditions['OR']['Datum.AdultSexTraf'] = $adult;
					}

					if ($minor) {
						$conditions['OR']['Datum.MinorSexTraf'] = $minor;
					}

					array_push($query, "<b>Case Type:</b> [OR] " . ($labor ? 'L' : '') . ($adult ? 'A' : '') . ($minor ? 'M' : ''));

					break;

				default:
					$this->request->data['Datum']['case_TypeOperator'] = 0;
					$conditions['OR'] = array();
					if ($labor) {
						$conditions['OR']['Datum.LaborTraf'] = $labor;
					}

					if ($adult) {
						$conditions['OR']['Datum.AdultSexTraf'] = $adult;
					}

					if ($minor) {
						$conditions['OR']['Datum.MinorSexTraf'] = $minor;
					}

					array_push($query, "<b>Case Type:</b> [OR] ". ($labor ? 'L' : '') . ($adult ? 'A' : '') . ($minor ? 'M' : ''));

					break;
			}
			
		}		

		/**
		 * Case filter section
		 */

		if ($this->request->data['Datum']['case_Name'] != '') {
			$display['case'] = true;
			$x = $this->request->data['Datum']['case_Name'];
			$conditions['Datum.CaseNam'] = $this->request->data['Datum']['case_Name'];
			array_push($query, "<b>Case Name:</b> $x");
		}

		if ($this->request->data['Datum']['case_Number'] != '') {
			$display['case'] = true;
			$x = $this->request->data['Datum']['case_Number'];
			$conditions['Datum.CaseNum'] = $this->request->data['Datum']['case_Number'];
			array_push($query, "<b>Case Number:</b> $x");
		}

		if ($this->request->data['Datum']['case_NumDef'] != '' && $this->request->data['Datum']['case_NumDef'] != '0;100') {
			$min = explode(';', $this->request->data['Datum']['case_NumDef'])[0];
			$max = explode(';', $this->request->data['Datum']['case_NumDef'])[1];

			$x = '<b># of Defendants: </b>';

			if (intval($min) != 0) {
				$display['case'] = true;
				$conditions['Datum.NumDef >='] = $min;
				$x = $x . "$min < ";
			}

			$x = $x . "x";
			
			if (intval($max) != 100) {
				$display['case'] = true;
				$conditions['Datum.NumDef <='] = $max;
				$x = $x . " < $max";
			}

			array_push($query, $x);
		}

		if ($this->request->data['Datum']['case_State'] != '') {

			$display['case'] = true;
			$state = array('AL','AK','AZ','AR','CA','CO','CT','DE',
						'FL','GA','HI','ID','IL','IN','IA','KS','KY',
						'LA','ME','MD','MA','MI','MN','MS','MO','MT',
						'NE','NV','NH','NJ','NM','NY','NC','ND','OH',
						'OK','OR','PA','RI','SC','SD','TN','TX','UT',
						'VT','VA','WA','WV','WI','WY');

			$conditions['Datum.State'] = $state[$this->request->data['Datum']['case_State']];
			$x = "<b>State: </b>" . $state[$this->request->data['Datum']['case_State']];
			array_push($query, $x);
		}

		if ($this->request->data['Datum']['case_FedDist'] != '') {
			$display['case'] = true;
			$conditions['Datum.FedDistrictNum'] = $this->request->data['Datum']['case_FedDist']+1;
			$x = "<b>Federal District:</b> " . $conditions['Datum.FedDistrictNum'];
			array_push($query, $x);
		}

		/**
		 * Defendant filter section
		 */

		if ($this->request->data['Datum']['defendant_Name'] != '') {
			$conditions['Datum.DefFirst'] = explode(", ", $this->request->data['Datum']['defendant_Name'])[1];
			$conditions['Datum.DefLast'] = explode(", ", $this->request->data['Datum']['defendant_Name'])[0];
			$display['defendant'] = true;
			$x = '<b>Defendant Name: </b>' . $conditions['Datum.DefLast'] . ', ' . $conditions['Datum.DefFirst'];
			array_push($query, $x);
		}

		if ($this->request->data['Datum']['defendant_Gender'] != '') {
			$conditions['Datum.DefGender'] = $this->request->data['Datum']['defendant_Gender'];
			$display['defendant'] = true;
			$x = '<b>Defendant Gender: </b>' . ($conditions['Datum.DefGender'] ? 'Female' : 'Male') ;
			array_push($query, $x);
		}

		if ($this->request->data['Datum']['defendant_Race'] != '') {
			$conditions['Datum.DefRace'] = $this->request->data['Datum']['defendant_Race'];
			$display['defendant'] = true;
			$x = '<b>Defendant Race: </b>' . $def_races[$conditions['Datum.DefRace']];
			array_push($query,$x);
		}
		

		if ($this->request->data['Datum']['defendant_YOB'] != '' && $this->request->data['Datum']['defendant_YOB'] != '1930;2014') {

			$min = explode(';', $this->request->data['Datum']['defendant_YOB'])[0];
			$max = explode(';', $this->request->data['Datum']['defendant_YOB'])[1];

			$x = '<b>Defendant Y.O.B.: </b>';

			if (intval($min) != 1930) {
				$conditions['Datum.DefBirthdate >='] = $min . '-01-01';
				$display['defendant'] = true;
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 2014) {
				$conditions['Datum.DefBirthdate <='] = $max . '-12-31';
				$display['defendant'] = true;
				$x = $x . ' < ' . $max;
			}
			array_push($query,$x);
		}

		/**
		 * Judge filter section
		 */

		if ($this->request->data['Datum']['judge_Name'] != '') {
			$conditions['Datum.JudgeName'] = $this->request->data['Datum']['judge_Name'];
			$display['judge'] = true;
			$x = '<b>Judge Name: </b>' . $conditions['Datum.JudgeName'];
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['judge_Race'] != '') {
			$conditions['Datum.JudgeRace'] = $this->request->data['Datum']['judge_Race'];
			$display['judge'] = true;
			$x = '<b>Judge Race: </b>' . $jdg_races[$conditions['Datum.JudgeRace']];
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['judge_Gender'] != '') {
			$conditions['Datum.JudgeGen'] = $this->request->data['Datum']['judge_Gender'];
			$display['judge'] = true;
			$x = '<b>Judge Gender: </b>' . ($conditions['Datum.JudgeGen'] ? 'Female' : 'Male');
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['judge_ApptBy'] != '') {
			$conditions['Datum.JudgeApptBy'] = $this->request->data['Datum']['judge_ApptBy'];
			$display['judge'] = true;
			$x = '<b>Judge Appointed By: </b>' . ($conditions['Datum.JudgeApptBy'] ? 'Democrat' : 'Republican');
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['judge_YearApp'] != '' && $this->request->data['Datum']['judge_YearApp'] != '1960;2020') {

			$min = explode(';', $this->request->data['Datum']['judge_YearApp'])[0];
			$max = explode(';', $this->request->data['Datum']['judge_YearApp'])[1];

			$x = '<b>Judge Tenure: </b>';

			if (intval($min) != 1960) {
				$conditions['Datum.JudgeTenure >='] = $min . '-01-01';
				$display['judge'] = true;
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 2020) {
				$conditions['Datum.JudgeTenure <='] = $max . '-12-31';
				$display['judge'] = true;
				$x = $x . ' < ' . $max;
			}
			array_push($query,$x);
		}

		/**
		 * Victims filter section
		 */

		if ($this->request->data['Datum']['victims_Total'] != '' && $this->request->data['Datum']['victims_Total'] != '0;100') {

			$min = explode(';', $this->request->data['Datum']['victims_Total'])[0];
			$max = explode(';', $this->request->data['Datum']['victims_Total'])[1];

			$x = '<b>Total Victims: </b>';

			if (intval($min) != 0) {
				$conditions['Datum.NumVic >='] = $min;
				$display['victims'] = true;
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 100) {
				$conditions['Datum.NumVic <='] = $max;
				$display['victims'] = true;
				$x = $x . ' < ' . $max;
			}
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['victims_Minor'] != '' && $this->request->data['Datum']['victims_Minor'] != '0;100') {

			$min = explode(';', $this->request->data['Datum']['victims_Minor'])[0];
			$max = explode(';', $this->request->data['Datum']['victims_Minor'])[1];

			$x = '<b>Minor Victims: </b>';

			if (intval($min) != 0) {
				$conditions['Datum.NumVicMinor >='] = $min;
				$display['victims'] = true;
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 100) {
				$conditions['Datum.NumVicMinor <='] = $max;
				$display['victims'] = true;
				$x = $x . ' < ' . $max;
			}
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['victims_Foreign'] != '' && $this->request->data['Datum']['victims_Foreign'] != '0;100') {

			$min = explode(';', $this->request->data['Datum']['victims_Foreign'])[0];
			$max = explode(';', $this->request->data['Datum']['victims_Foreign'])[1];

			$x = '<b>Foreign Victims: </b>';

			if (intval($min) != 0) {
				$conditions['Datum.NumVicForeign >='] = $min;
				$display['victims'] = true;
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 100) {
				$conditions['Datum.NumVicForeign <='] = $max;
				$display['victims'] = true;
				$x = $x . ' < ' . $max;
			}
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['victims_Female'] != '' && $this->request->data['Datum']['victims_Female'] != '0;100') {

			$min = explode(';', $this->request->data['Datum']['victims_Female'])[0];
			$max = explode(';', $this->request->data['Datum']['victims_Female'])[1];

			$x = '<b>Female Victims: </b>';

			if (intval($min) != 0) {
				$conditions['Datum.NumVicFemale >='] = $min;
				$display['victims'] = true;
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 100) {
				$conditions['Datum.NumVicFemale <='] = $max;
				$display['victims'] = true;
				$x = $x . ' < ' . $max;
			}
			array_push($query,$x);
		}

		/**
		 * ArrestChargeDetails filter section
		 */

		if ($this->request->data['Datum']['ad_DateArrest'] != '' && $this->request->data['Datum']['ad_DateArrest'] != '2000;2020') {

			$min = explode(';', $this->request->data['Datum']['ad_DateArrest'])[0];
			$max = explode(';', $this->request->data['Datum']['ad_DateArrest'])[1];

			$x = '<b>Arrest Date: </b>';

			if (intval($min) != 2000) {
				$display['acd'] = true;
				$conditions['Datum.ArrestDate >='] = $min . '-01-01';
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 2020) {
				$display['acd'] = true;
				$conditions['Datum.ArrestDate <='] = $max . '-12-31';
				$x = $x . ' < ' . $max;
			}	
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['ad_BailType'] != '') {
			$conditions['Datum.BailType'] = $this->request->data['Datum']['ad_BailType'];
			$display['acd'] = true;
			$x = '<b>Bail Type: </b>';
			$x = $x . $bail_types[$conditions['Datum.BailType']];
		}

		if ($this->request->data['Datum']['ad_BailAmount'] != '' && $this->request->data['Datum']['ad_BailAmount'] != '1000;100000') {	

			$min = explode(';', $this->request->data['Datum']['ad_BailAmount'])[0];
			$max = explode(';', $this->request->data['Datum']['ad_BailAmount'])[1];

			$x = '<b>Bail Amount: </b>';

			if (intval($min) != 1000) {
				$display['acd'] = true;
				$conditions['Datum.BailAmount >='] = $min;
				$x = $x . '$' . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 100000) {
				$display['acd'] = true;
				$conditions['Datum.BailAmount <='] = $max;
				$x = $x . ' < $' . $max;
			}
			array_push($query,$x);
		}

		/* CD */
		if ($this->request->data['Datum']['cd_Date'] != '' && $this->request->data['Datum']['cd_Date'] != '2000;2020') {

			$min = explode(';', $this->request->data['Datum']['cd_Date'])[0];
			$max = explode(';', $this->request->data['Datum']['cd_Date'])[1];

			$x = '<b>Charge Date: </b>';

			if (intval($min) != 2000) {
				$conditions['Datum.ChargeDate >='] = $min . '-01-01';
				$display['cd'] = true;
				$display['acd'] = true;
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 2020) {
				$conditions['Datum.ChargeDate <='] = $max . '-12-31';
				$display['cd'] = true;
				$display['acd'] = true;
				$x = $x . ' < ' . $max;
			}
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['cd_TtlCharges'] != '' && $this->request->data['Datum']['cd_TtlCharges'] != '0;20') {

			$min = explode(';', $this->request->data['Datum']['cd_TtlCharges'])[0];
			$max = explode(';', $this->request->data['Datum']['cd_TtlCharges'])[1];

			$x = '<b>Charge Date: </b>';

			if (intval($min) != 0) {
				$conditions['Datum.FelCharged >='] = $min;
				$display['cd'] = true;
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 20) {
				$conditions['Datum.FelCharged <='] = $max;
				$display['cd'] = true;
				$x = $x . ' < ' . $max;
			}
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['cd_Statute'] != '') {
			$display['cd'] = true;
			$s_name = $statutes[$this->request->data['Datum']['cd_Statute']];
			$conditions["Datum.S$s_name"] = true;
			$statute_flag = true;
			$x = '<b>Statute: </b>' . $s_name;
			array_push($query,$x);
		}

		/**
		 * Sentence filter section
		 */

		if ($this->request->data['Datum']['sd_TtlFelonies'] != '' && $this->request->data['Datum']['sd_TtlFelonies'] != '0;20') {

			$min = explode(';', $this->request->data['Datum']['sd_TtlFelonies'])[0];
			$max = explode(';', $this->request->data['Datum']['sd_TtlFelonies'])[1];

			$x = '<b>Total Felonies Sentenced: </b>';

			if (intval($min) != 0) {
				$display['sentence'] = true;
				$conditions['Datum.FelSentenced >='] = $min;
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 10) {
				$display['sentence'] = true;
				$conditions['Datum.FelSentenced <='] = $max;
				$x = $x . ' < ' . $max;
			} else {
				$conditions['Datum.FelSentenced <'] = 999;
			}
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['sd_DateTerminated'] != '' && $this->request->data['Datum']['sd_DateTerminated'] != '2000;2020') {

			$min = explode(';',$this->request->data['Datum']['sd_DateTerminated'])[0];
			$max = explode(';',$this->request->data['Datum']['sd_DateTerminated'])[1];

			$x = '<b>Date Terminated: </b>';

			if (intval($min) != 2000) {
				$conditions['Datum.DateTerm >='] = $min . '-01-01';
				$display['sentence'] = true;
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 2020) {
				$conditions['Datum.DateTerm <='] = $max . '-12-31';
				$display['sentence'] = true;
				$x = $x . ' < ' . $max;
			}
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['sd_TtlMonths'] != '' && $this->request->data['Datum']['sd_TtlMonths'] != '0;300') {


			$min = explode(';', $this->request->data['Datum']['sd_TtlMonths'])[0];
			$max = explode(';', $this->request->data['Datum']['sd_TtlMonths'])[1];

			$x = '<b>Total Months Sentenced: </b>';

			if (intval($min) != 0) {
				$conditions['Datum.TotalSentence >='] = $min;
				$display['sentence'] = true;
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 300) {
				$conditions['Datum.TotalSentence <='] = $max;
				$display['sentence'] = true;
				$x = $x . ' < ' . $max;
			}
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['sd_Restitution'] != '' && $this->request->data['Datum']['sd_Restitution'] != '0;10000000') {


			$min = explode(';', $this->request->data['Datum']['sd_Restitution'])[0];
			$max = explode(';', $this->request->data['Datum']['sd_Restitution'])[1];

			$x = '<b>Restitution: </b>';

			if (intval($min) != 0) {
				$conditions['Datum.Restitution >='] = $min;
				$display['sentence'] = true;
				$x = $x . '$' . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 10000000) {
				$conditions['Datum.Restitution <='] = $max;
				$display['sentence'] = true;
				$x = $x . ' < $' . $max;
			}
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['sd_AssetForfeit'] != '') {
			$conditions['Datum.AssetForfeit'] = $this->request->data['Datum']['sd_AssetForfeit'];
			$display['sentence'] = true;
			$x = '<b>Asset Forfeiture: </b>' . ($conditions['Datum.AssetForfeit'] ? 'True' : 'False');
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['sd_MonthsProb'] != '' && $this->request->data['Datum']['sd_MonthsProb'] != '0;300') {

			$min = explode(';', $this->request->data['Datum']['sd_MonthsProb'])[0];
			$max = explode(';', $this->request->data['Datum']['sd_MonthsProb'])[1];

			$x = '<b>Total Months Probation: </b>';

			if (intval($min) != 0) {
				$conditions['Datum.Probation >='] = $min;
				$display['sentence'] = true;
				$x = $x . $min . ' < ';
			}

			$x = $x . 'x';

			if (intval($max) != 300) {
				$conditions['Datum.Probation <='] = $max;
				$display['sentence'] = true;
				$x = $x . ' < ' . $max;
			}
			array_push($query,$x);
		}

		/**
		 * OrganizedCrimeGroup filter section
		 */

		$ocg_conds = array();

		if ($this->request->data['Datum']['ocg_Name'] != '') {
			array_push($ocg_conds, array(
					'OR' => array(
						array('OCName1' => $this->request->data['Datum']['ocg_Name']),
						array('OCName2' => $this->request->data['Datum']['ocg_Name'])
					)
				)
			);
			$display['ocg'] = true;
			$x = '<b>Organized Crime Group Name: </b>' . $this->request->data['Datum']['ocg_Name'];
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['ocg_Type'] != '') {
			array_push($ocg_conds, array(
					'OR' => array(
						array('OCType1' => ($this->request->data['Datum']['ocg_Type'] + 1)),
						array('OCType2' => ($this->request->data['Datum']['ocg_Type'] + 1))
					)
				)
			);
			$display['ocg'] = true;
			$x = '<b>Organized Crime Group Size: </b>' . $ocg_types[($this->request->data['Datum']['ocg_Type'] + 1)];
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['ocg_Scope'] != '') {
			array_push($ocg_conds, array(
					'OR' => array(
						array('OCScope1' => ($this->request->data['Datum']['ocg_Scope'] + 1)),
						array('OCScope2' => ($this->request->data['Datum']['ocg_Scope'] + 1))
					)
				)
			);
			$display['ocg'] = true;
			$x = '<b>Organized Crime Group Scope: </b>' . $ocg_scopes[($this->request->data['Datum']['ocg_Scope'] + 1)];
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['ocg_Race'] != '') {
			array_push($ocg_conds, array(
					'OR' => array(
						array('OCRace1' => ($this->request->data['Datum']['ocg_Race'] + 1)),
						array('OCRace2' => ($this->request->data['Datum']['ocg_Race'] + 1))
					)
				)
			);
			$display['ocg'] = true;
			$x = '<b>Organized Crime Group Race: </b>' . $ocg_races[($this->request->data['Datum']['ocg_Race'] + 1)];
			array_push($query,$x);
		}

		if ($display['ocg']) array_push($conditions, $ocg_conds);

		/**
		 * Charge filter
		 */

		$charge_conds = array();
		$cc = array();

		// charge
		if ($this->request->data['Datum']['cd_Counts'] != '' && $this->request->data['Datum']['cd_Counts'] != '0;10') {
			$min = explode(';', $this->request->data['Datum']['cd_Counts'])[0];
			$max = explode(';', $this->request->data['Datum']['cd_Counts'])[1];

			$x = '<b>Counts: </b>' . $min . ' < x < ' . $max;

			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				$t_conds = array();

				if (intval($min) != 0) {
					array_push($t_conds, array("Counts$stat >=" => $min));
					$cc["Counts$stat >="] = $min;
					$display['cd'] = true;
				}

				if (intval($max) != 10) {
					array_push($t_conds, array("Counts$stat <=" => $max));
					$cc["Counts$stat <="] = $max;
					$display['cd'] = true;
				}

				array_push($conds['OR'], $t_conds);
			}
			array_push($charge_conds, $conds);
			array_push($query,$x);
		}

		// charge
		if ($this->request->data['Datum']['cd_CountsNP'] != '' && $this->request->data['Datum']['cd_CountsNP'] != '0;10') {
			$min = explode(';', $this->request->data['Datum']['cd_CountsNP'])[0];
			$max = explode(';', $this->request->data['Datum']['cd_CountsNP'])[1];

			$x = '<b>Counts Nolle Prossed: </b>' . $min . ' < x < ' . $max;

			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				$t_conds = array();

				if (intval($min) != 0) {
					array_push($t_conds, array("CountsNP$stat >=" => $min));
					$cc["CountsNP$stat >="] = $min;
					$display['cd'] = true;
				}

				if (intval($max) != 10) {
					array_push($t_conds, array("CountsNP$stat <=" => $max));
					$cc["CountsNP$stat <="] = $max;
					$display['cd'] = true;
				}

				array_push($conds['OR'], $t_conds);
			}
			array_push($charge_conds, $conds);
			array_push($query,$x);
		}

		// charge
		if ($this->request->data['Datum']['cd_PleaDismiss'] != '' && $this->request->data['Datum']['cd_PleaDismiss'] != '0;10') {
			$min = explode(';', $this->request->data['Datum']['cd_PleaDismiss'])[0];
			$max = explode(';', $this->request->data['Datum']['cd_PleaDismiss'])[1];

			$x = '<b>Pleas Dismissed: </b>' . $min . ' < x < ' . $max;

			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				$t_conds = array();

				if (intval($min) != 0) {
					array_push($t_conds, array("PleaDismissed$stat >=" => $min));
					$cc["PleaDismissed$stat >="] = $min;
					$display['cd'] = true;
				}

				if (intval($max) != 10) {
					array_push($t_conds, array("PleaDismissed$stat <=" => $max));
					$cc["PleaDismissed$stat <="] = $max;
					$display['cd'] = true;
				}

				array_push($conds['OR'], $t_conds);
			}
			array_push($charge_conds, $conds);
			array_push($query,$x);
		}

		// charge
		if ($this->request->data['Datum']['cd_PleaGuilty'] != '' && $this->request->data['Datum']['cd_PleaGuilty'] != '0;10') {	
			$min = explode(';', $this->request->data['Datum']['cd_PleaGuilty'])[0];
			$max = explode(';', $this->request->data['Datum']['cd_PleaGuilty'])[1];

			$x = '<b>Pleas Guilty: </b>' . $min . ' < x < ' . $max;

			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				$t_conds = array();

				if (intval($min) != 0) {
					array_push($t_conds, array("PleaGuilty$stat >=" => $min));
					$cc["PleaGuilty$stat >="] = $min;
					$display['cd'] = true;
				}

				if (intval($max) != 10) {
					array_push($t_conds, array("PleaGuilty$stat <=" => $max));
					$cc["PleaGuilty$stat <="] = $max;
					$display['cd'] = true;
				}

				array_push($conds['OR'], $t_conds);
			}
			array_push($charge_conds, $conds);
			array_push($query,$x);
		}

		// charge
		if ($this->request->data['Datum']['cd_TrialGuilty'] != '' && $this->request->data['Datum']['cd_TrialGuilty'] != '0;10') {	

			$min = explode(';', $this->request->data['Datum']['cd_TrialGuilty'])[0];
			$max = explode(';', $this->request->data['Datum']['cd_TrialGuilty'])[1];

			$x = '<b>Trials Guilty: </b>' . $min . ' < x < ' . $max;

			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				$t_conds = array();

				if (intval($min) != 0) {
					array_push($t_conds, array("TrialGuilty$stat >=" => $min));
					$cc["TrialGuilty$stat >="] = $min;
					$display['cd'] = true;
				}

				if (intval($max) != 10) {
					array_push($t_conds, array("TrialGuilty$stat <=" => $max));
					$cc["TrialGuilty$stat <="] = $max;
					$display['cd'] = true;
				}

				array_push($conds['OR'], $t_conds);
			}
			array_push($charge_conds, $conds);
			array_push($query,$x);
		}

		// charge
		if ($this->request->data['Datum']['cd_TrialNotGuilty'] != '' && $this->request->data['Datum']['cd_TrialNotGuilty'] != '0;10') {	

			$min = explode(';', $this->request->data['Datum']['cd_TrialNotGuilty'])[0];
			$max = explode(';', $this->request->data['Datum']['cd_TrialNotGuilty'])[1];

			$x = '<b>Trials Not Guilty: </b>' . $min . ' < x < ' . $max;

			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				$t_conds = array();

				if (intval($min) != 0) {
					array_push($t_conds, array("TrialNG$stat >=" => $min));
					$cc["TrialNG$stat >="] = $min;
					$display['cd'] = true;
				}

				if (intval($max) != 10) {
					array_push($t_conds, array("TrialNG$stat <=" => $max));
					$cc["TrialNG$stat <="] = $max;
					$display['cd'] = true;
				}

				array_push($conds['OR'], $t_conds);
				array_push($cc, $t_conds);
			}
			array_push($charge_conds, $conds);
			array_push($query,$x);
		}

		// charge
		if ($this->request->data['Datum']['cd_Sentence'] != '' && $this->request->data['Datum']['cd_Sentence'] != '0;300') {
			
			$min = explode(';', $this->request->data['Datum']['cd_Sentence'])[0];
			$max = explode(';', $this->request->data['Datum']['cd_Sentence'])[1];

			$x = '<b>Months Sentenced for Charge: </b>' . $min . ' < x < ' . $max;

			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				$t_conds = array();

				if (intval($min) != 0) {
					array_push($t_conds, array("Sent$stat >=" => $min));
					$cc["Sent$stat >="] = $min;
					$display['cd'] = true;
				}

				if (intval($max) != 300) {
					array_push($t_conds, array("Sent$stat <=" => $max));
					$cc["Sent$stat <="] = $max;
					$display['cd'] = true;
				}

				array_push($conds['OR'], $t_conds);
				array_push($cc, $t_conds);
			}
			array_push($charge_conds, $conds);
			array_push($query,$x);
		}

		// charge
		if ($this->request->data['Datum']['cd_Probation'] != '' && $this->request->data['Datum']['cd_Probation'] != '0;300') {	
			
			$min = explode(';', $this->request->data['Datum']['cd_Probation'])[0];
			$max = explode(';', $this->request->data['Datum']['cd_Probation'])[1];

			$x = '<b>Months Probation for Charge: </b>' . $min . ' < x < ' . $max;

			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				$t_conds = array();

				if (intval($min) != 0) {
					array_push($t_conds, array("Prob$stat >=" => $min));
					$cc["Prob$stat >="] = $min;
					$display['cd'] = true;
				}

				if (intval($max) != 300) {
					array_push($t_conds, array("Prob$stat <=" => $max));
					$cc["Prob$stat <="] = $max;
					$display['cd'] = true;
				}

				array_push($conds['OR'], $t_conds);
			}
			array_push($charge_conds, $conds);
			array_push($query,$x);
		}

		if ($this->request->data['Datum']['cd_Fines'] != '' && $this->request->data['Datum']['cd_Fines'] != '0;1000') {

			$min = explode(';', $this->request->data['Datum']['cd_Fines'])[0];
			$max = explode(';', $this->request->data['Datum']['cd_Fines'])[1];

			$x = '<b>Fines for Charge: </b>' . $min . ' < x < ' . $max;

			$conds = array(
				'OR' => array()
			);
			foreach ($statutes as $stat) {
				$t_conds = array();

				if (intval($min) != 0) {
					array_push($t_conds, array("Fines$stat >=" => $min));
					$cc["Fines$stat >="] = $min;
					$display['cd'] = true;
				}

				if (intval($max) != 1000) {
					array_push($t_conds, array("Fines$stat <=" => $max));
					$cc["Fines$stat <="] = $max;
					$display['cd'] = true;
				}

				array_push($conds['OR'], $t_conds);
			}
			array_push($charge_conds, $conds);
			array_push($query,$x);
		}

		if ($display['cd']) array_push($conditions, $charge_conds);

		$prev_search = $display;

		$ret_cnds = $conditions;		

		$case_nums = $this->Datum->find('all', array('conditions' => $conditions, 'fields' => array('DISTINCT Datum.CaseNum')));

		// debug($case_nums);

		$cn = array();
		foreach ($case_nums as $case_num) {
			array_push($cn, $case_num['Datum']['CaseNum']);
		}
		$datum = $this->Datum->find('all', array('conditions' => array('Datum.CaseNum' => $cn), 'order' => array('Datum.CaseNum DESC')));

		// debug($datum);

		$cases = array();
		$case_name = '';

		foreach ($datum as $d) {

			$ocg_filter = 0;
			$def_filter = 0;
			$cd_filter = 0;
			$ad_filter = 0;
			$sd_filter = 0;

			if ($display['defendant']) {
				if ($def_filter == 0) $def_filter = 1;
				if (isset($conditions['Datum.DefFirst']) && ($d['Datum']['DefFirst'] != $conditions['Datum.DefFirst'])) {
					$def_filter = -1;
				}
				if (isset($conditions['Datum.DefLast']) && ($d['Datum']['DefLast'] != $conditions['Datum.DefLast'])) {
					$def_filter = -1;
				}
				if (isset($conditions['Datum.DefRace']) && ($d['Datum']['DefRace'] != $conditions['Datum.DefRace'])) {
					$def_filter = -1;
				}
				if (isset($conditions['Datum.DefBirthdate >=']) && ($d['Datum']['DefBirthdate'] < split("-", $conditions['Datum.DefBirthdate >='])[0])) {
					$def_filter = -1;
				}
				if (isset($conditions['Datum.DefBirthdate <=']) && ($d['Datum']['DefBirthdate'] > split("-", $conditions['Datum.DefBirthdate <='])[0])) {
					$def_filter = -1;
				}
				if (isset($conditions['Datum.DefGender']) && ($d['Datum']['DefGender'] != $conditions['Datum.DefGender'])) {
					$def_filter = -1;
				}
			}

			if ($display['ocg']) {
				if ($def_filter == 0) $def_filter = 1;
				if ($ocg_filter == 0) $ocg_filter = 1;
				if (isset($conditions['OCName']) && ($d['Datum']['OCName1'] != $conditions['OCName'] && $d['Datum']['OCName2'] != $conditions['OCName'])) {
					$def_filter = -1;
					$ocg_filter = -1;
				}
				if (isset($conditions['OCType']) && ($d['Datum']['OCType1'] != $conditions['OCType'] && $d['Datum']['OCType2'] != $conditions['OCType'])) {
					$def_filter = -1;
					$ocg_filter = -1;
				}
				if (isset($conditions['OCScope']) && ($d['Datum']['OCScope1'] != $conditions['OCScope'] && $d['Datum']['OCScope2'] != $conditions['OCScope'])) {
					$def_filter = -1;
					$ocg_filter = -1;
				}
				if (isset($conditions['OCRace']) && ($d['Datum']['OCRace1'] != $conditions['OCRace'] && $d['Datum']['OCRace2'] != $conditions['OCRace'])) {
					$def_filter = -1;
					$ocg_filter = -1;
				}
			}

			if ($display['acd']) {
				if ($def_filter == 0) $def_filter = 1;
				if ($ad_filter == 0) $ad_filter = 1;
				if (isset($conditions['Datum.ArrestDate >=']) && ($d['Datum']['ArrestDate'] > $conditions['Datum.ArrestDate >='])) {
					$def_filter = -1;
					$ad_filter = -1;
				}

				if (isset($conditions['Datum.ArrestDate <=']) && ($d['Datum']['ArrestDate'] < $conditions['Datum.ArrestDate <='])) {
					$def_filter = -1;
					$ad_filter = -1;
				}

				if (isset($conditions['Datum.BailType']) && ($d['Datum']['BailType'] != $conditions['Datum.BailType'])) {
					$def_filter = -1;
					$ad_filter = -1;
				}
				
				if (isset($conditions['Datum.BailAmount >=']) && ($d['Datum']['BailAmount'] < $conditions['Datum.BailAmount >='])) {
					$def_filter = -1;
					$ad_filter = -1;
				}
				
				if (isset($conditions['Datum.BailAmount <=']) && ($d['Datum']['BailAmount'] > $conditions['Datum.BailAmount <='])) {
					$def_filter = -1;
					$ad_filter = -1;
				}
			}

			if ($display['sentence']) {
				if ($def_filter == 0) $def_filter = 1;
				if ($sd_filter == 0) $sd_filter = 1;

				if (isset($conditions['Datum.FelSentenced >=']) && ($d['Datum']['FelSentenced'] < $conditions['Datum.FelSentenced >='])) {
					$def_filter = -1;
					$sd_filter = -1;
				}

				if (isset($conditions['Datum.FelSentenced <=']) && ($d['Datum']['FelSentenced'] > $conditions['Datum.FelSentenced <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['Datum.DateTerm >=']) && ($d['Datum']['DateTerm'] < $conditions['Datum.DateTerm >='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['Datum.DateTerm <=']) && ($d['Datum']['DateTerm'] > $conditions['Datum.DateTerm <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['Datum.TotalSentence >=']) && ($d['Datum']['TotalSentence'] < $conditions['Datum.TotalSentence >='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['Datum.TotalSentence <=']) && ($d['Datum']['TotalSentence'] > $conditions['Datum.TotalSentence <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['Datum.Restitution >=']) && ($d['Datum']['Restitution'] < $conditions['Datum.Restitution >='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['Datum.Restitution <=']) && ($d['Datum']['Restitution'] > $conditions['Datum.Restitution <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['Datum.AssetForfeit >=']) && ($d['Datum']['AssetForfeit'] < $conditions['Datum.AssetForfeit >='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['Datum.AssetForfeit <=']) && ($d['Datum']['AssetForfeit'] > $conditions['Datum.AssetForfeit <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['Datum.Appeal >=']) && ($d['Datum']['Appeal'] < $conditions['Datum.Appeal >='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['Datum.Appeal <=']) && ($d['Datum']['Appeal'] > $conditions['Datum.Appeal <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['Datum.Probation >=']) && ($d['Datum']['Probation'] < $conditions['Datum.Probation >='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['Datum.Probation <=']) && ($d['Datum']['Probation'] > $conditions['Datum.Probation <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}				
			}

			$charges = array();
			foreach ($statutes as $statute) {
				if ($display['cd']) {
					if ($def_filter == 0) $def_filter = 1;
					if ($cd_filter == 0) $cd_filter = 1;
					if ($d['Datum']["S$statute"] != 0) {

						$def_filter = 1;
						$cd_filter = 1;

						if($statute_flag && !isset($conditions["Datum.S$statute"])) {
							$def_filter = -1;
							$cd_filter = -1;
						}

						if (isset($cc["Counts$statute >="]) && intval($d['Datum']["Counts$statute"]) < $cc["Counts$statute >="]) {
							$cd_filter = -1;
							$def_filter = -1;
						}

						if (isset($conditions["Counts$statute <="]) && intval($d['Datum']["Counts$statute"]) > $cc["Counts$statute <="]) {
							$cd_filter = -1;
							$def_filter = -1;
						}

						if (isset($conditions["CountsNP$statute >="]) && intval($d['Datum']["CountsNP$statute"]) < $cc["Counts$statute >="]) {
							$cd_filter = -1;
							$def_filter = -1;
						}
						
						if (isset($conditions["CountsNP$statute <="]) && intval($d['Datum']["CountsNP$statute"]) > $cc["Counts$statute <="]) {
							$cd_filter = -1;
							$def_filter = -1;
						}
						
						if (isset($conditions["PleaDismissed$statute <="]) && intval($d['Datum']["PleaDismissed$statute"]) > $cc["PleaDismissed$statute <="]) {
							$cd_filter = -1;
							$def_filter = -1;
						}
						
						if (isset($conditions["PleaDismissed$statute >="]) && intval($d['Datum']["PleaDismissed$statute"]) < $cc["PleaDismissed$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["PleaGuilty$statute <="]) && intval($d['Datum']["PleaGuilty$statute"]) > $cc["PleaGuilty$statute <="]) {
							$cd_filter = -1;
							$def_filter = -1;
						}
						
						if (isset($conditions["PleaGuilty$statute >="]) && intval($d['Datum']["PleaGuilty$statute"]) < $cc["PleaGuilty$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["TrialGuilty$statute <="]) && intval($d['Datum']["TrialGuilty$statute"]) > $cc["TrialGuilty$statute <="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["TrialGuilty$statute >="]) && intval($d['Datum']["TrialGuilty$statute"]) < $cc["TrialGuilty$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["TrialNG$statute <="]) && intval($d['Datum']["TrialNG$statute"]) > $cc["TrialNG$statute <="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["TrialNG$statute >="]) && intval($d['Datum']["TrialNG$statute"]) < $cc["TrialNG$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["Sent$statute <="]) && intval($d['Datum']["Sent$statute"]) > $cc["Sent$statute <="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["Sent$statute >="]) && intval($d['Datum']["Sent$statute"]) < $cc["Sent$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["Prob$statute <="]) && intval($d['Datum']["Prob$statute"]) > $cc["Prob$statute <="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["Prob$statute >="]) && intval($d['Datum']["Prob$statute"]) < $cc["Prob$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["Fines$statute <="]) && intval($d['Datum']["Fines$statute"]) > $cc["Fines$statute <="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["Fines$statute >="]) && intval($d['Datum']["Fines$statute"]) < $cc["Fines$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
					}
				}

				if ($d['Datum']["S$statute"] != 0) {
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
							$d['Datum']["Prob$statute"],
							($cd_filter == 1 ? true : false)
						)
					);
				}
			}

			if ($def_filter == 1) {
				$display['defendant'] = true;
			}

			if (strcmp($d['Datum']['CaseNam'], $case_name) != 0) {
				$case_name = $d['Datum']['CaseNam'];
				array_push(
					$cases,
					array(
						$d['Datum']['CaseNam'],			// 0
						$d['Datum']['CaseNum'],
						$d['Datum']['ChargeDate'],
						$d['Datum']['LaborTraf'],
						$d['Datum']['AdultSexTraf'],
						$d['Datum']['MinorSexTraf'],		// 5
						$d['Datum']['NumDef'],
						$d['Datum']['State'],
						$d['Datum']['FedDistrictLoc'],
						$d['Datum']['FedDistrictNum'],
						$d['Datum']['CaseSummary'],		// 10
						$d['Datum']['JudgeName'],
						$d['Datum']['JudgeRace'],
						$d['Datum']['JudgeGen'],
						$d['Datum']['JudgeTenure'],
						$d['Datum']['JudgeApptBy'],		// 15
						$d['Datum']['NumVic'],
						$d['Datum']['NumVicMinor'],
						$d['Datum']['NumVicForeign'],
						$d['Datum']['NumVicFemale'],
						array(										// 20
							array(
								$d['Datum']['DefLast'],		// 0
								$d['Datum']['DefFirst'],
								$d['Datum']['Alias'],
								$d['Datum']['DefGender'],
								$d['Datum']['DefRace'],
								$d['Datum']['DefBirthdate'],	// 5
								$d['Datum']['DefArrestAge'],
								$d['Datum']['ChargeDate'],
								$d['Datum']['ArrestDate'],
								$d['Datum']['Detained'],
								$d['Datum']['BailType'],		// 10
								$d['Datum']['BailAmount'],
								($ad_filter == 1 ? true : false),
								$d['Datum']['FelCharged'],
								$d['Datum']['FelSentenced'],
								$d['Datum']['DateTerm'],		// 15
								$d['Datum']['SentDate'],
								$d['Datum']['TotalSentence'],
								$d['Datum']['Restitution'],
								$d['Datum']['AssetForfeit'],
								'',			// 20
								$d['Datum']['SupRelease'],
								$d['Datum']['Probation'],
								$charges,
								$d['Datum']['OCName1'],
								$d['Datum']['OCType1'],		// 25
								$d['Datum']['OCRace1'],
								$d['Datum']['OCScope1'],
								$d['Datum']['OCName2'],
								$d['Datum']['OCType2'],
								$d['Datum']['OCRace2'],		// 30
								$d['Datum']['OCScope2'],
								($def_filter == 1 ? true : false),
								($ocg_filter == 1 ? true : false),
								($sd_filter == 1 ? true : false)
							)
						)
					)
				);
			} else {
				array_push(
					$cases[count($cases) - 1][20],
					array(
						$d['Datum']['DefLast'],
						$d['Datum']['DefFirst'],
						$d['Datum']['Alias'],
						$d['Datum']['DefGender'],
						$d['Datum']['DefRace'],
						$d['Datum']['DefBirthdate'],
						$d['Datum']['DefArrestAge'],
						$d['Datum']['ChargeDate'],
						$d['Datum']['ArrestDate'],
						$d['Datum']['Detained'],
						$d['Datum']['BailType'],
						$d['Datum']['BailAmount'],
						($ad_filter == 1 ? true : false),
						$d['Datum']['FelCharged'],
						$d['Datum']['FelSentenced'],
						$d['Datum']['DateTerm'],
						$d['Datum']['SentDate'],
						$d['Datum']['TotalSentence'],
						$d['Datum']['Restitution'],
						$d['Datum']['AssetForfeit'],
						'',
						$d['Datum']['SupRelease'],
						$d['Datum']['Probation'],
						$charges,
						$d['Datum']['OCName1'],
						$d['Datum']['OCType1'],
						$d['Datum']['OCRace1'],
						$d['Datum']['OCScope1'],
						$d['Datum']['OCName2'],
						$d['Datum']['OCType2'],
						$d['Datum']['OCRace2'],
						$d['Datum']['OCScope2'],
						($def_filter == 1 ? true : false),
						($ocg_filter == 1 ? true : false),
						($sd_filter == 1 ? true : false)
					)
				);
			}
		}

		$this->set('display', $display);
		$this->set('cases', $cases);
		$this->Session->write('case_info',$cases);
		$this->set('prev_search', $prev_search);
		$this->set('query', $query);
		$this->Session->write('query', $query);
	}

	public function home() {
		$this->set('title', 'Database Search | Human Trafficking Data');
		$this->set('active', 'search');

		if ($this->request->is('post')) {
			$this->update();
		}
	}

	public function autoComplete() {
		$this->autoRender = false;

		$term = trim(strip_tags($_GET['term']));
		$column = trim(strip_tags($_GET['column']));
		$cols = split(",", $column);

		if (sizeof($cols) == 1) {
			$data = $this->Datum->find('all', array(
				'fields' => 'DISTINCT ' . $cols[0],
				'conditions' => array(
					'Datum.' . $cols[0] . ' LIKE' => '%' . $term . '%'
				)
			));
		} else if (sizeof($cols) == 2) {
			$data = $this->Datum->find('all', array(
				'fields' => array($cols[0], $cols[1]),
				'conditions' => array(
					'OR' => array(
						'Datum.' . $cols[0] . ' LIKE' => "%" . $term . "%",
						'Datum.' . $cols[1] . ' LIKE' => "%" . $term . "%"
					)
				)
			));
		} else {
			$data = array();
		}

		$vals = array();
		$index = 0;
		foreach ($data as $d) {
			if ($index++ > 9) break;

			if (sizeof($cols) < 2) {
				array_push($vals, $d['Datum'][$cols[0]]);
			} else {
				array_push($vals, $d['Datum'][$cols[1]] . ', ' . $d['Datum'][$cols[0]]);
			}
		}

		echo json_encode($vals);
	}
}