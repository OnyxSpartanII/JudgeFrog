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

		/**
		 * Case type filter section
		 */
		
		$conditions = array();

		if ($this->request->data['DataInProgress']['case_Adult'] || $this->request->data['DataInProgress']['case_Minor'] || $this->request->data['DataInProgress']['case_Labor']) {
			
			$display['type'] = true;

			$adult = $this->request->data['DataInProgress']['case_Adult'];
			$minor = $this->request->data['DataInProgress']['case_Minor'];
			$labor = $this->request->data['DataInProgress']['case_Labor'];

			switch ($this->request->data['DataInProgress']['case_TypeOperator']) {
				case 0:
					$conditions['AND'] = array('DataInProgress.LaborTraf' => $this->request->data['DataInProgress']['case_Labor'],
												'DataInProgress.AdultSexTraf' => $this->request->data['DataInProgress']['case_Adult'],
												'DataInProgress.MinorSexTraf' => $this->request->data['DataInProgress']['case_Minor']);
					break;
				
				case 1:
					$conditions['OR'] = array();
					if ($labor) {
						$conditions['OR']['DataInProgress.LaborTraf'] = $labor;
					}

					if ($adult) {
						$conditions['OR']['DataInProgress.AdultSexTraf'] = $adult;
					}

					if ($minor) {
						$conditions['OR']['DataInProgress.MinorSexTraf'] = $minor;
					}
					break;

				default:
					$conditions['OR'] = array();
					if ($labor) {
						$conditions['OR']['DataInProgress.LaborTraf'] = $labor;
					}

					if ($adult) {
						$conditions['OR']['DataInProgress.AdultSexTraf'] = $adult;
					}

					if ($minor) {
						$conditions['OR']['DataInProgress.MinorSexTraf'] = $minor;
					}
					break;
			}
			
		}		

		/**
		 * Case filter section
		 */

		if ($this->request->data['DataInProgress']['case_Name'] != '') {
			$display['case'] = true;
			$conditions['DataInProgress.CaseNam'] = $this->request->data['DataInProgress']['case_Name'];
		}

		if ($this->request->data['DataInProgress']['case_Number'] != '') {
			$display['case'] = true;
			$conditions['DataInProgress.CaseNum'] = $this->request->data['DataInProgress']['case_Number'];
		}

		if ($this->request->data['DataInProgress']['case_NumDef'] != '') {
			$min = explode(';', $this->request->data['DataInProgress']['case_NumDef'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['case_NumDef'])[1];

			if (intval($min) != 0) {
				$display['case'] = true;
				$conditions['DataInProgress.NumDef >='] = $min;
			}
			
			if (intval($max) != 100) {
				$display['case'] = true;
				$conditions['DataInProgress.NumDef <='] = $max;
			}
		}

		if ($this->request->data['DataInProgress']['case_State'] != '') {

			$display['case'] = true;
			$state = array('AL','AK','AZ','AR','CA','CO','CT','DE',
						'FL','GA','HI','ID','IL','IN','IA','KS','KY',
						'LA','ME','MD','MA','MI','MN','MS','MO','MT',
						'NE','NV','NH','NJ','NM','NY','NC','ND','OH',
						'OK','OR','PA','RI','SC','SD','TN','TX','UT',
						'VT','VA','WA','WV','WI','WY');

			$conditions['DataInProgress.State'] = $state[$this->request->data['DataInProgress']['case_State']];
		}

		if ($this->request->data['DataInProgress']['case_FedDist'] != '') {
			$display['case'] = true;
			$conditions['DataInProgress.FedDistrictNum'] = $this->request->data['DataInProgress']['case_FedDist']+1;
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
		

		if ($this->request->data['DataInProgress']['defendant_YOB'] != '') {

			$min = explode(';', $this->request->data['DataInProgress']['defendant_YOB'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['defendant_YOB'])[1];

			if (intval($min) != 1930) {
				$conditions['DataInProgress.DefBirthdate >='] = $min . '-01-01';
				$display['defendant'] = true;
			}

			if (intval($max) != 2014) {
				$conditions['DataInProgress.DefBirthdate <='] = $max . '-12-31';
				$display['defendant'] = true;
			}
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

		if ($this->request->data['DataInProgress']['judge_YearApp'] != '') {

			$min = explode(';', $this->request->data['DataInProgress']['judge_YearApp'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['judge_YearApp'])[1];

			if (intval($min) != 1960) {
				$conditions['DataInProgress.JudgeTenure >='] = $min . '-01-01';
				$display['judge'] = true;
			}

			if (intval($max) != 2020) {
				$conditions['DataInProgress.JudgeTenure <='] = $max . '-12-31';
				$display['judge'] = true;
			}
		}

		/**
		 * Victims filter section
		 */

		if ($this->request->data['DataInProgress']['victims_Total'] != '') {

			$min = explode(';', $this->request->data['DataInProgress']['victims_Total'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['victims_Total'])[1];

			if (intval($min) != 0) {
				$conditions['DataInProgress.NumVic >='] = $min;
				$display['victims'] = true;
			}

			if (intval($max) != 100) {
				$conditions['DataInProgress.NumVic <='] = $max;
				$display['victims'] = true;
			}
		}

		if ($this->request->data['DataInProgress']['victims_Minor'] != '') {

			$min = explode(';', $this->request->data['DataInProgress']['victims_Minor'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['victims_Minor'])[1];

			if (intval($min) != 0) {
				$conditions['DataInProgress.NumVicMinor >='] = $min;
				$display['victims'] = true;
			}

			if (intval($max) != 100) {
				$conditions['DataInProgress.NumVicMinor <='] = $max;
				$display['victims'] = true;
			}
		}

		if ($this->request->data['DataInProgress']['victims_Foreign'] != '') {

			$min = explode(';', $this->request->data['DataInProgress']['victims_Foreign'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['victims_Foreign'])[1];

			if (intval($min) != 0) {
				$conditions['DataInProgress.NumVicForeign >='] = $min;
				$display['victims'] = true;
			}

			if (intval($max) != 100) {
				$conditions['DataInProgress.NumVicForeign <='] = $max;
				$display['victims'] = true;
			}
		}

		if ($this->request->data['DataInProgress']['victims_Female'] != '') {

			$min = explode(';', $this->request->data['DataInProgress']['victims_Female'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['victims_Female'])[1];

			if (intval($min) != 0) {
				$conditions['DataInProgress.NumVicFemale >='] = $min;
				$display['victims'] = true;
			}

			if (intval($max) != 100) {
				$conditions['DataInProgress.NumVicFemale <='] = $max;
				$display['victims'] = true;
			}
		}

		/**
		 * ArrestChargeDetails filter section
		 */

		if ($this->request->data['DataInProgress']['ad_DateArrest'] != '') {

			$min = explode(';', $this->request->data['DataInProgress']['ad_DateArrest'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['ad_DateArrest'])[1];

			if (intval($min) != 2000) {
				$display['acd'] = true;
				$conditions['DataInProgress.ArrestDate >='] = $min . '-01-01';
			}

			if (intval($max) != 2020) {
				$display['acd'] = true;
				$conditions['DataInProgress.ArrestDate <='] = $max . '-12-31';
			}	
		}

		if ($this->request->data['DataInProgress']['ad_BailType'] != '') {
			$conditions['DataInProgress.BailType'] = $this->request->data['DataInProgress']['ad_BailType'];
			$display['acd'] = true;
		}

		if ($this->request->data['DataInProgress']['ad_BailAmount'] != '') {	

			$min = explode(';', $this->request->data['DataInProgress']['ad_BailAmount'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['ad_BailAmount'])[1];

			if (intval($min) != 1000) {
				$display['acd'] = true;
				$conditions['DataInProgress.BailAmount >='] = $min;
			}

			if (intval($max) != 100000) {
				$display['acd'] = true;
				$conditions['DataInProgress.BailAmount <='] = $max;
			}

		}

		/* CD */
		if ($this->request->data['DataInProgress']['cd_Date'] != '') {

			$min = explode(';', $this->request->data['DataInProgress']['cd_Date'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['cd_Date'])[1];

			if (intval($min) != 2000) {
				$conditions['DataInProgress.ChargeDate >='] = $min . '-01-01';
				$display['cd'] = true;
			}

			if (intval($max) != 2020) {
				$conditions['DataInProgress.ChargeDate <='] = $max . '-12-31';
				$display['cd'] = true;
			}			
		}

		if ($this->request->data['DataInProgress']['cd_TtlCharges'] != '') {

			$min = explode(';', $this->request->data['DataInProgress']['cd_TtlCharges'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['cd_TtlCharges'])[1];

			if (intval($min) != 0) {
				$conditions['DataInProgress.FelCharged >='] = $min;
				$display['cd'] = true;
			}

			if (intval($max) != 20) {
				$conditions['DataInProgress.FelCharged <='] = $max;
				$display['cd'] = true;
			}
		}

		if ($this->request->data['DataInProgress']['cd_Statute'] != '') {
			$display['cd'] = true;
			$s_name = $statutes[$this->request->data['DataInProgress']['cd_Statute']];
			$conditions["DataInProgress.S$s_name"] = true;
			$statute_flag = true;
		}

		/**
		 * Sentence filter section
		 */

		if ($this->request->data['DataInProgress']['sd_TtlFelonies'] != '') {

			$min = explode(';', $this->request->data['DataInProgress']['sd_TtlFelonies'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['sd_TtlFelonies'])[1];

			if (intval($min) != 0) {
				$display['sentence'] = true;
				$conditions['DataInProgress.FelSentenced >='] = $min;
			}

			if (intval($max) != 10) {
				$display['sentence'] = true;
				$conditions['DataInProgress.FelSentenced <='] = $max;
			} else {
				$conditions['DataInProgress.FelSentenced <'] = 999;
			}
		}

		if ($this->request->data['DataInProgress']['sd_DateTerminated'] != '') {

			$min = explode(';',$this->request->data['DataInProgress']['sd_DateTerminated'])[0];
			$max = explode(';',$this->request->data['DataInProgress']['sd_DateTerminated'])[1];

			if (intval($min) != 2000) {
				$conditions['DataInProgress.DateTerm >='] = $min . '-01-01';
				$display['sentence'] = true;
			}

			if (intval($max) != 2020) {
				$conditions['DataInProgress.DateTerm <='] = $max . '-12-31';
				$display['sentence'] = true;
			}
		}

		if ($this->request->data['DataInProgress']['sd_TtlMonths'] != '') {


			$min = explode(';', $this->request->data['DataInProgress']['sd_TtlMonths'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['sd_TtlMonths'])[1];

			if (intval($min) != 0) {
				$conditions['DataInProgress.TotalSentence >='] = $min;
				$display['sentence'] = true;
			}

			if (intval($max) != 300) {
				$conditions['DataInProgress.TotalSentence <='] = $max;
				$display['sentence'] = true;
			}
		}

		if ($this->request->data['DataInProgress']['sd_Restitution'] != '') {


			$min = explode(';', $this->request->data['DataInProgress']['sd_Restitution'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['sd_Restitution'])[1];

			if (intval($min) != 0) {
				$conditions['DataInProgress.Restitution >='] = $min;
				$display['sentence'] = true;
			}

			if (intval($max) != 10000000) {
				$conditions['DataInProgress.Restitution <='] = $max;
				$display['sentence'] = true;
			}
		}

		if ($this->request->data['DataInProgress']['sd_AssetForfeit'] != '') {
			$conditions['DataInProgress.AssetForfeit'] = $this->request->data['DataInProgress']['sd_AssetForfeit'];
			$display['sentence'] = true;
		}

		if ($this->request->data['DataInProgress']['sd_MonthsProb'] != '') {

			$min = explode(';', $this->request->data['DataInProgress']['sd_MonthsProb'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['sd_MonthsProb'])[1];

			if (intval($min) != 0) {
				$conditions['DataInProgress.Probation >='] = $min;
				$display['sentence'] = true;
			}

			if (intval($max) != 300) {
				$conditions['DataInProgress.Probation <='] = $max;
				$display['sentence'] = true;
			}
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
		$cc = array();

		// charge
		if ($this->request->data['DataInProgress']['cd_Counts'] != '') {
			$min = explode(';', $this->request->data['DataInProgress']['cd_Counts'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['cd_Counts'])[1];

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
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_CountsNP'] != '') {
			$min = explode(';', $this->request->data['DataInProgress']['cd_CountsNP'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['cd_CountsNP'])[1];

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
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_PleaDismiss'] != '') {
			$min = explode(';', $this->request->data['DataInProgress']['cd_PleaDismiss'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['cd_PleaDismiss'])[1];

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
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_PleaGuilty'] != '') {	
			$min = explode(';', $this->request->data['DataInProgress']['cd_PleaGuilty'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['cd_PleaGuilty'])[1];

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
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_TrialGuilty'] != '') {	

			$min = explode(';', $this->request->data['DataInProgress']['cd_TrialGuilty'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['cd_TrialGuilty'])[1];

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
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_TrialNotGuilty'] != '') {	

			$min = explode(';', $this->request->data['DataInProgress']['cd_TrialNotGuilty'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['cd_TrialNotGuilty'])[1];

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
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_Sentence'] != '') {
			
			$min = explode(';', $this->request->data['DataInProgress']['cd_Sentence'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['cd_Sentence'])[1];

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
		}

		// charge
		if ($this->request->data['DataInProgress']['cd_Probation'] != '') {	
			
			$min = explode(';', $this->request->data['DataInProgress']['cd_Probation'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['cd_Probation'])[1];

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
		}

		if ($this->request->data['DataInProgress']['cd_Fines'] != '') {

			$min = explode(';', $this->request->data['DataInProgress']['cd_Fines'])[0];
			$max = explode(';', $this->request->data['DataInProgress']['cd_Fines'])[1];

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
		}

		if ($display['cd']) array_push($conditions, $charge_conds);

		$prev_search = $display;

		$case_nums = $this->DataInProgress->find('all', array('conditions' => $conditions, 'fields' => array('DataInProgress.CaseNum')));

		$cn = array();
		foreach ($case_nums as $case_num) {
			array_push($cn, $case_num['DataInProgress']['CaseNum']);
		}
		$datum = $this->DataInProgress->find('all', array('conditions' => array('DataInProgress.CaseNum' => $cn)));
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
				if (isset($conditions['DataInProgress.DefFirst']) && ($d['DataInProgress']['DefFirst'] != $conditions['DataInProgress.DefFirst'])) {
					$def_filter = -1;
				}
				if (isset($conditions['DataInProgress.DefLast']) && ($d['DataInProgress']['DefLast'] != $conditions['DataInProgress.DefLast'])) {
					$def_filter = -1;
				}
				if (isset($conditions['DataInProgress.DefRace']) && ($d['DataInProgress']['DefRace'] != $conditions['DataInProgress.DefRace'])) {
					$def_filter = -1;
				}
				if (isset($conditions['DataInProgress.DefBirthdate >=']) && ($d['DataInProgress']['DefBirthdate'] < split("-", $conditions['DataInProgress.DefBirthdate >='])[0])) {
					$def_filter = -1;
				}
				if (isset($conditions['DataInProgress.DefBirthdate <=']) && ($d['DataInProgress']['DefBirthdate'] > split("-", $conditions['DataInProgress.DefBirthdate <='])[0])) {
					$def_filter = -1;
				}
				if (isset($conditions['DataInProgress.DefGender']) && ($d['DataInProgress']['DefGender'] != $conditions['DataInProgress.DefGender'])) {
					$def_filter = -1;
				}
			}

			if ($display['ocg']) {
				if ($def_filter == 0) $def_filter = 1;
				if ($ocg_filter == 0) $ocg_filter = 1;
				if (isset($conditions['OCName']) && ($d['DataInProgress']['OCName1'] != $conditions['OCName'] && $d['DataInProgress']['OCName2'] != $conditions['OCName'])) {
					$def_filter = -1;
					$ocg_filter = -1;
				}
				if (isset($conditions['OCType']) && ($d['DataInProgress']['OCType1'] != $conditions['OCType'] && $d['DataInProgress']['OCType2'] != $conditions['OCType'])) {
					$def_filter = -1;
					$ocg_filter = -1;
				}
				if (isset($conditions['OCScope']) && ($d['DataInProgress']['OCScope1'] != $conditions['OCScope'] && $d['DataInProgress']['OCScope2'] != $conditions['OCScope'])) {
					$def_filter = -1;
					$ocg_filter = -1;
				}
				if (isset($conditions['OCRace']) && ($d['DataInProgress']['OCRace1'] != $conditions['OCRace'] && $d['DataInProgress']['OCRace2'] != $conditions['OCRace'])) {
					$def_filter = -1;
					$ocg_filter = -1;
				}
			}

			if ($display['acd']) {
				if ($def_filter == 0) $def_filter = 1;
				if ($ad_filter == 0) $ad_filter = 1;
				if (isset($conditions['DataInProgress.ArrestDate >=']) && ($d['DataInProgress']['ArrestDate'] > $conditions['DataInProgress.ArrestDate >='])) {
					$def_filter = -1;
					$ad_filter = -1;
				}

				if (isset($conditions['DataInProgress.ArrestDate <=']) && ($d['DataInProgress']['ArrestDate'] < $conditions['DataInProgress.ArrestDate <='])) {
					$def_filter = -1;
					$ad_filter = -1;
				}

				if (isset($conditions['DataInProgress.BailType']) && ($d['DataInProgress']['BailType'] != $conditions['DataInProgress.BailType'])) {
					$def_filter = -1;
					$ad_filter = -1;
				}
				
				if (isset($conditions['DataInProgress.BailAmount >=']) && ($d['DataInProgress']['BailAmount'] < $conditions['DataInProgress.BailAmount >='])) {
					$def_filter = -1;
					$ad_filter = -1;
				}
				
				if (isset($conditions['DataInProgress.BailAmount <=']) && ($d['DataInProgress']['BailAmount'] > $conditions['DataInProgress.BailAmount <='])) {
					$def_filter = -1;
					$ad_filter = -1;
				}
			}

			if ($display['sentence']) {
				if ($def_filter == 0) $def_filter = 1;
				if ($sd_filter == 0) $sd_filter = 1;

				if (isset($conditions['DataInProgress.FelSentenced >=']) && ($d['DataInProgress']['FelSentenced'] < $conditions['DataInProgress.FelSentenced >='])) {
					$def_filter = -1;
					$sd_filter = -1;
				}

				if (isset($conditions['DataInProgress.FelSentenced <=']) && ($d['DataInProgress']['FelSentenced'] > $conditions['DataInProgress.FelSentenced <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['DataInProgress.DateTerm >=']) && ($d['DataInProgress']['DateTerm'] < $conditions['DataInProgress.DateTerm >='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['DataInProgress.DateTerm <=']) && ($d['DataInProgress']['DateTerm'] > $conditions['DataInProgress.DateTerm <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['DataInProgress.TotalSentence >=']) && ($d['DataInProgress']['TotalSentence'] < $conditions['DataInProgress.TotalSentence >='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['DataInProgress.TotalSentence <=']) && ($d['DataInProgress']['TotalSentence'] > $conditions['DataInProgress.TotalSentence <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['DataInProgress.Restitution >=']) && ($d['DataInProgress']['Restitution'] < $conditions['DataInProgress.Restitution >='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['DataInProgress.Restitution <=']) && ($d['DataInProgress']['Restitution'] > $conditions['DataInProgress.Restitution <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['DataInProgress.AssetForfeit >=']) && ($d['DataInProgress']['AssetForfeit'] < $conditions['DataInProgress.AssetForfeit >='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['DataInProgress.AssetForfeit <=']) && ($d['DataInProgress']['AssetForfeit'] > $conditions['DataInProgress.AssetForfeit <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['DataInProgress.Appeal >=']) && ($d['DataInProgress']['Appeal'] < $conditions['DataInProgress.Appeal >='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['DataInProgress.Appeal <=']) && ($d['DataInProgress']['Appeal'] > $conditions['DataInProgress.Appeal <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['DataInProgress.Probation >=']) && ($d['DataInProgress']['Probation'] < $conditions['DataInProgress.Probation >='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}

				if (isset($conditions['DataInProgress.Probation <=']) && ($d['DataInProgress']['Probation'] > $conditions['DataInProgress.Probation <='])) {
					$sd_filter = -1;
					$def_filter = -1;
				}				
			}

			$charges = array();
			foreach ($statutes as $statute) {
				if ($display['cd']) {
					if ($def_filter == 0) $def_filter = 1;
					if ($cd_filter == 0) $cd_filter = 1;
					if ($d['DataInProgress']["S$statute"] != 0) {

						$def_filter = 1;
						$cd_filter = 1;

						if($statute_flag && !isset($conditions["DataInProgress.S$statute"])) {
							$def_filter = -1;
							$cd_filter = -1;
						}

						if (isset($cc["Counts$statute >="]) && intval($d['DataInProgress']["Counts$statute"]) < $cc["Counts$statute >="]) {
							$cd_filter = -1;
							$def_filter = -1;
						}

						if (isset($conditions["Counts$statute <="]) && intval($d['DataInProgress']["Counts$statute"]) > $cc["Counts$statute <="]) {
							$cd_filter = -1;
							$def_filter = -1;
						}

						if (isset($conditions["CountsNP$statute >="]) && intval($d['DataInProgress']["CountsNP$statute"]) < $cc["Counts$statute >="]) {
							$cd_filter = -1;
							$def_filter = -1;
						}
						
						if (isset($conditions["CountsNP$statute <="]) && intval($d['DataInProgress']["CountsNP$statute"]) > $cc["Counts$statute <="]) {
							$cd_filter = -1;
							$def_filter = -1;
						}
						
						if (isset($conditions["PleaDismissed$statute <="]) && intval($d['DataInProgress']["PleaDismissed$statute"]) > $cc["PleaDismissed$statute <="]) {
							$cd_filter = -1;
							$def_filter = -1;
						}
						
						if (isset($conditions["PleaDismissed$statute >="]) && intval($d['DataInProgress']["PleaDismissed$statute"]) < $cc["PleaDismissed$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["PleaGuilty$statute <="]) && intval($d['DataInProgress']["PleaGuilty$statute"]) > $cc["PleaGuilty$statute <="]) {
							$cd_filter = -1;
							$def_filter = -1;
						}
						
						if (isset($conditions["PleaGuilty$statute >="]) && intval($d['DataInProgress']["PleaGuilty$statute"]) < $cc["PleaGuilty$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["TrialGuilty$statute <="]) && intval($d['DataInProgress']["TrialGuilty$statute"]) > $cc["TrialGuilty$statute <="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["TrialGuilty$statute >="]) && intval($d['DataInProgress']["TrialGuilty$statute"]) < $cc["TrialGuilty$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["TrialNG$statute <="]) && intval($d['DataInProgress']["TrialNG$statute"]) > $cc["TrialNG$statute <="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["TrialNG$statute >="]) && intval($d['DataInProgress']["TrialNG$statute"]) < $cc["TrialNG$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["Sent$statute <="]) && intval($d['DataInProgress']["Sent$statute"]) > $cc["Sent$statute <="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["Sent$statute >="]) && intval($d['DataInProgress']["Sent$statute"]) < $cc["Sent$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["Prob$statute <="]) && intval($d['DataInProgress']["Prob$statute"]) > $cc["Prob$statute <="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["Prob$statute >="]) && intval($d['DataInProgress']["Prob$statute"]) < $cc["Prob$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["Fines$statute <="]) && intval($d['DataInProgress']["Fines$statute"]) > $cc["Fines$statute <="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
						
						if (isset($conditions["Fines$statute >="]) && intval($d['DataInProgress']["Fines$statute"]) < $cc["Fines$statute >="]) {
							$def_filter = -1;
							$cd_filter = -1;
						}
					}
				}

				if ($d['DataInProgress']["S$statute"] != 0) {
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
							($cd_filter == 1 ? true : false)
						)
					);
				}
			}

			if ($def_filter == 1) {
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
								($ad_filter == 1 ? true : false),
								$d['DataInProgress']['FelCharged'],
								$d['DataInProgress']['FelSentenced'],
								$d['DataInProgress']['DateTerm'],		// 15
								$d['DataInProgress']['SentDate'],
								$d['DataInProgress']['TotalSentence'],
								$d['DataInProgress']['Restitution'],
								$d['DataInProgress']['AssetForfeit'],
								'',			// 20
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
						($ad_filter == 1 ? true : false),
						$d['DataInProgress']['FelCharged'],
						$d['DataInProgress']['FelSentenced'],
						$d['DataInProgress']['DateTerm'],
						$d['DataInProgress']['SentDate'],
						$d['DataInProgress']['TotalSentence'],
						$d['DataInProgress']['Restitution'],
						$d['DataInProgress']['AssetForfeit'],
						'',
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
						($def_filter == 1 ? true : false),
						($ocg_filter == 1 ? true : false),
						($sd_filter == 1 ? true : false)
					)
				);
			}
		}

		$this->set('display', $display);
		$this->set('cases', $cases);
		$this->set('prev_search', $prev_search);
		$this->set('query', $this->request->data);
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
			$data = $this->DataInProgress->find('all', array(
				'fields' => 'DISTINCT ' . $cols[0],
				'conditions' => array(
					'DataInProgress.' . $cols[0] . ' LIKE' => '%' . $term . '%'
				)
			));
		} else if (sizeof($cols) == 2) {
			$data = $this->DataInProgress->find('all', array(
				'fields' => array($cols[0], $cols[1]),
				'conditions' => array(
					'OR' => array(
						'DataInProgress.' . $cols[0] . ' LIKE' => "%" . $term . "%",
						'DataInProgress.' . $cols[1] . ' LIKE' => "%" . $term . "%"
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
				array_push($vals, $d['DataInProgress'][$cols[0]]);
			} else {
				array_push($vals, $d['DataInProgress'][$cols[1]] . ', ' . $d['DataInProgress'][$cols[0]]);
			}
		}

		echo json_encode($vals);
	}
}