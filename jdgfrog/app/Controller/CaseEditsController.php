<?php

App::uses('AppController', 'Controller');

class CaseEditsController extends AppController {
	public $helpers = array('Html', 'Session');
	public $components = array('Session', 'Paginator');
	public $name = 'CaseEdits';
	public $uses = array('DataInProgress');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('editDefendant', 'getCase', 'edit', 'saveEdits');
	}


	public function index() {

		$this->set('title', 'Case Edit - Admin Panel | Human Trafficking Data');
		$this->layout = 'admin_panel_layout';
		$this->set('active', 'edit');
		
		$c_s = $this->DataInProgress->find('all');
		
		$statutes = ['1961to1968', '1028', '1351',
						'1425', '1512', '1546', '1581to1588', '1589',
						'1590', '1591', '1592', '2252', '2260', '2421to2424',
						'1324', '1328'];

		$prev_name = "";

		$case_info = array();
		$p_cases = array();

		foreach ($c_s as $d) {
			$charges = array();
			foreach ($statutes as $statute) {
				if ($d['DataInProgress']["S$statute"] != null) {
					array_push($charges, array(
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
						)
					);
				}
			}

			if (strcmp($prev_name, $d['DataInProgress']['CaseNam']) != 0) {

				array_push($p_cases, array($d['DataInProgress']['CaseNum'], $d['DataInProgress']['author']));

				array_push($case_info, array(
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
					array()										//20
				));
				$prev_name = $d['DataInProgress']['CaseNam'];
			}

			array_push($case_info[sizeof($case_info)-1][20], array(
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
				$d['DataInProgress']['FelCharged'],
				$d['DataInProgress']['FelSentenced'],
				$d['DataInProgress']['DateTerm'],
				$d['DataInProgress']['SentDate'],		//15
				$d['DataInProgress']['TotalSentence'],
				$d['DataInProgress']['Restitution'],
				$d['DataInProgress']['AssetForfeit'],
				$d['DataInProgress']['SupRelease'],
				$d['DataInProgress']['Probation'],		//20
				$d['DataInProgress']['OCName1'],
				$d['DataInProgress']['OCType1'],
				$d['DataInProgress']['OCRace1'],
				$d['DataInProgress']['OCScope1'],
				$d['DataInProgress']['OCName2'],		//25
				$d['DataInProgress']['OCType2'],
				$d['DataInProgress']['OCRace2'],
				$d['DataInProgress']['OCScope2'],
				$charges
			));
		}

		$this->Session->write('case_info', $case_info);
		$this->set('p_cases', $p_cases);
	}

	public function generateTable($index) {

		$case_info = $this->Session->read('case_info');

		$this->autoRender = false;

		$races = array('White','Black','Hispanic','Asian','Indian','Other','Unknown');
		$bail_types = array('None','Surety','Non-Surety');
		$ocg_types = array('Other','Mom & Pop','Street Gang','Cartel/Syndicate/Mafia','','Prison Gang');
		$ocg_scopes = array('Other','Local Only','Trans-State','Trans-National');
		$ocg_races = array('None','Black','White','Hispanic','Asian','Other');

		$html = '<div class="case_info">' .
					'<table class="modal_table all_results">' .
					  '<thead>' .
					  '<tr>' .
						'<th>Case Name</th>' .
						'<th>Case Number</th>' .
						'<th># of Defendents</th>' .
						'<th>State</th>' .
						'<th>Federal District</th>' .
						'<th>Year</th>' .
					  '</tr>' .
					  '</thead>' .
					  '<tbody>' .
					  '<tr>' .
						'<td>' . $case_info[$index][0] . '</td>' .
						'<td>' . $case_info[$index][1] . '</td>' .
						'<td>' . $case_info[$index][6] . '</td>' .
						'<td>' . $case_info[$index][7] . '</td>' .
						'<td>' . $case_info[$index][9] . ($case_info[$index][8] !== null ? '-' . $case_info[$index][8] : '') .
						'<td>' . split("-", $case_info[$index][2])[0] . '</td>' .
					  '</tr>' .
					  '</tbody>' .
					'</table>' .
					  '<h4>Case Summary</h4>' .
					  '<p class="case_summary">' .
						$case_info[$index][10] .
					  '</p>' .
				  '</div>' .
				  '<table class="table_col">' .
					'<caption>Defendent Information</caption>' .
					'<thead>' .
					'<tr>' .
					  '<td>Name</td>' .
					  '<td>Gender</td>' .
					  '<td>Year of Birth</td>' .
					  '<td>Race</td>' .
					'</tr>' .
					'</thead>' .
					'<tbody>';
					foreach ($case_info[$index][20] as $def) {
						$html = $html . '<tr class="toggle_def">' . 
								'<td>' . $def[0] . ', ' . $def[1] . '</td>'.
								'<td>' . ($def[3] === null ? 'N/A' : ($def[3] ? 'Female' : 'Male')) . '</td>'.
								'<td>' . ($def[5] === '0000' ? 'Unknown' : $def[5]) . '</td>'.
								'<td>' . ($def[4] === null ? 'Unknown' : $races[$def[4]]) . '</td>'.
							'</tr>' .
							'<tr class="this_def_info">' .
								'<td colspan="4">' .
									'<table class="modal_table table_col">' .
										'<caption>Arrest Information</caption>' .
										'<thead>' .
										'<tr>' .
										  '<th>Arrest Date</th>' .
										  '<th>Charge Date</th>' .
										  '<th>Bail Type</th>' .
										  '<th>Bail Amount</th>' .
										'</tr>' .
										'</thead>' .
										'<tbody>' .
										'<tr>' .
											'<td>' . ($def[8] === '0000-00-00' ? 'N/A' : $def[8]) . '</td>' .
											'<td>' . ($def[7] === '0000-00-00' ? 'N/A' : $def[7]) . '</td>' .
											'<td>' . ($def[10] === null ? 'N/A' : $bail_types[$def[10]]) . '</td>' .
											'<td>' . ($def[11] === null ? 'N/A' : '$' . $def[11]) . '</td>' .
										'</tr>' .
										'</tbody>' .
									'</table>' .
								'</td>' .
							'</tr>' .

							'<tr class="this_def_info">' .
								'<td colspan="4">' .
								  '<table class="modal_table table_col">' .
									'<caption>Charge Information</caption>' .
									'<thead>' .
									'<tr>' .
										'<th>Statute</th>' .
										'<th>Counts</th>' .
										'<th>Counts Nolle Prossed</th>' .
										'<th>Plea Guilty</th>' .
										'<th>Plea Dismissed</th>' .
										'<th>Trial Guilty</th>' .
										'<th>Trial Not Guilty</th>' .
										'<th>Fines</th>' .
										'<th>Months Sentenced</th>' .
										'<th>Months Probation</th>' .
									'</tr>' .
									'</thead>' .
									'<tbody>';
									
						foreach ($def[29] as $chrg) {
							$html = $html . '<tr>' .
								'<td>' . ($chrg[0]  === null ? 'N/A' : $chrg[0]) . '</td>' .
								'<td>' . ($chrg[1] === null ? 'N/A' : $chrg[1]) . '</td>' .
								'<td>' . ($chrg[2] === null ? 'N/A' : $chrg[2]) . '</td>' .
								'<td>' . ($chrg[3] === null ? 'N/A' : $chrg[3]) . '</td>' .
								'<td>' . ($chrg[4] === null ? 'N/A' : $chrg[4]) . '</td>' .
								'<td>' . ($chrg[5] === null ? 'N/A' : $chrg[5]) . '</td>' .
								'<td>' . ($chrg[6] === null ? 'N/A' : $chrg[6]) . '</td>' .
								'<td>' . ($chrg[7] === null ? 'N/A' : '$' . $chrg[7]) . '</td>' .
								'<td>' . ($chrg[8] === null ? 'N/A' : $chrg[8]) . '</td>' .
								'<td>' . ($chrg[9] === null ? 'N/A' : $chrg[9]) . '</td>' .
								'</tr>';
						}

						$html = $html .
								'</tbody>' .
							  '</table>' .
							'</td>' .
						  '</tr>' . 
						  '<tr class="this_def_info">' .
							'<td colspan="4">' .
								'<table class="modal_table table_col">' .
									'<caption>Sentence Information</caption>' .
									'<thead>' .
										'<tr>' .
											'<th>Total Charges</th>' .
											'<th>Total Sentences</th>' .
											'<th>Year Terminated</th>' .
											'<th>Months Sentenced</th>' .
											'<th>Months Probation</th>' .
											'<th>Restitution</th>' .
											'<th>Asset Forfeiture?</th>' .
										'</tr>' .
									'</thead>' .
									'<tbody>' .
										'<tr>' .
											'<td>' . ($def[12] === null ? 'N/A' : $def[12]) . '</td>' .
											'<td>' . ($def[13] === null ? 'N/A' : $def[13]) . '</td>' .
											'<td>' . ($def[14] === '0000' ? 'N/A' : $def[14]) . '</td>' .
											'<td>' . ($def[16] === null ? 'N/A' : $def[16]) . '</td>' .
											'<td>' . ($def[20] === null ? 'N/A' : $def[20]) . '</td>' .
											'<td>' . ($def[17] === null ? 'N/A' : '$' . $def[17]) . '</td>' .
											'<td>' . ($def[18] === null ? 'N/A' : ($def[18] ? 'True' : 'False')) . '</td>' .
										'</tr>' .
									'</tbody>' .
								'</table>' .
							'</td>' .
						'</tr>' .
						'<tr class="this_def_info">' .
							'<td colspan="4">' .
								'<table class="modal_table table_col">' .
									'<caption>Organized Crime Group Information</caption>' .
									'<thead>' .
										'<tr>' .
											'<th>Name</th>' .
											'<th>Size</th>' .
											'<th>Race</th>' .
											'<th>Scope</th>' .
										'</tr>' .
									'</thead>' .
									'<tbody>' .
										'<tr>' .
											'<td>' . ($def[21] === null ? 'None' : $def[21]) . '</td>' .
											'<td>' . ($def[22] === null ? 'N/A' : $ocg_types[$def[22]]) . '</td>' .
											'<td>' . ($def[23] === null ? 'N/A' : $ocg_races[$def[23]]) . '</td>' .
											'<td>' . ($def[24] === null ? 'N/A' : $ocg_scopes[$def[24]]) . '</td>' . 
										'</tr>' .
										'<tr>' .
											'<td>' . ($def[25] === null ? 'None' : $def[25]) . '</td>' .
											'<td>' . ($def[26] === null ? 'N/A' : $ocg_types[$def[26]]) . '</td>' .
											'<td>' . ($def[27] === null ? 'N/A' : $ocg_races[$def[27]]) . '</td>' .
											'<td>' . ($def[28] === null ? 'N/A' : $ocg_scopes[$def[28]]) . '</td>' . 
										'</tr>' .
									'</tbody>' .
								'</table>' .
							'</td>' .
						'</tr>';
					}
					'</tbody>' .
				  '</table>' .
				  '<table class="modal_table table_col">' .
					'<caption>Victims Information</caption>' .
					'<thead>' .
					'<tr>' .
					  '<th>Total # Victims</th>' .
					  '<th>Total # of Minors</th>' .
					  '<th>Total # of Foreigners</th>' .
					  '<th>Total # of Females</th>' .
					'</tr>' .
					'</thead>' .
					'<tbody>' .
					'<tr>' .
						'<td>' . ($case_info[$index][16] === null ? 'Unknown' : $case_info[$index][16]) . '</td>' .
						'<td>' . ($case_info[$index][17] === null ? 'Unknown' : $case_info[$index][17]) . '</td>' .
						'<td>' . ($case_info[$index][18] === null ? 'Unknown' : $case_info[$index][18]) . '</td>' .
						'<td>' . ($case_info[$index][19] === null ? 'Unknown' : $case_info[$index][19]) . '</td>' .
					'</tr>' .
					'</tbody>' .
				  '</table>' .

				  '<table class="modal_table all_results">' .
					'<caption>Judge Information</caption>' .
					'<thead>' .
					'<tr>' .
					  '<th>Name</th>' .
					  '<th>Race</th>' .
					  '<th>Gender</th>' .
					  '<th>Tenure</th>' .
					  '<th>Appointed By</th>' .
					'</tr>' .
					'</thead>' .
					'<tbody>' .
					'<tr>' .
						'<td>' . $case_info[$index][11] . '</td>' .
						'<td>' . ($case_info[$index][12] === null ? 'N/A' : $races[$case_info[$index][12]]) . '</td>' .
						'<td>' . ($case_info[$index][13] ? 'Female' : 'Male') . '</td>' .
						'<td>' . $case_info[$index][14] . '</td>' .
						'<td>' . ($case_info[$index][15] ? 'Democrat' : 'Republican') . '</td>' .
					'</tr>' .
					'</tbody>' .
				  '</table>' .
				'</div>';

		echo $html;
	}

	public function edit($num) {
		$this->autoRender = false;

		$caseNumber = $num;
		//$caseNumber = '1:13-cr-00069-LO';
		$case = $this->getCase($caseNumber);
		if ($case) {
			$this->set('case', $case);	
		} else {
			$this->set('caseNotFoundError', true);
			print_r('Case not found.');
		}
		// 30 defs: 3:10-cr-00260
		// 4 defs: 2:07-cr-00785-JLL
		

		if ($this->request->is('post')) {

			$data = $this->request->data;
			//debug($data);
			$caseName		= $data['DataInProgress']['CaseNam'];
			$caseNum 		= $data['DataInProgress']['CaseNum'];
			$numDef 		= $data['DataInProgress']['NumDef'];
			$state 			= $data['DataInProgress']['State'];
			$fedDistLoc 	= $data['DataInProgress']['FedDistrictLoc'];
			$fedDistNum 	= $data['DataInProgress']['FedDistrictNum'];
			$judgeName 		= $data['DataInProgress']['JudgeName'];
			$judgeRace 		= $data['DataInProgress']['JudgeRace'];
			$judgeGen 		= $data['DataInProgress']['JudgeGen'];
			$judgeApptBy 	= $data['DataInProgress']['JudgeApptBy'];
			$judgeTenure 	= $data['DataInProgress']['JudgeTenure'];
			$caseSummary 	= $data['DataInProgress']['CaseSummary'];
			$laborTraf 		= $data['DataInProgress']['LaborTraf'];
			$adultTraf 		= $data['DataInProgress']['AdultSexTraf'];
			$minorTraf 		= $data['DataInProgress']['MinorSexTraf'];
			$numVic 		= $data['DataInProgress']['NumVic'];
			$numVicMinor	= $data['DataInProgress']['NumVicMinor'];
			$numVicForeign	= $data['DataInProgress']['NumVicForeign'];
			$numVicFemale	= $data['DataInProgress']['NumVicFemale'];

			$caseName = addslashes($caseName);
			$judgeName = addslashes($judgeName);
			$caseSummary = addslashes($caseSummary);

			//debug($caseSummary);
			//debug($judgeName);
			//debug($caseName);

			//$caseName = 'DROP TABLE DataInProgress_backup';
			/*
			* 	Using variables here in $fields may allow SQL injections according to someone on Stackoverflow?
			*	However, when tested nothing happened. Instead the CaseNam was changed to the above string, 
			*	for example. More testing for vulnerabilities?
			*
			*	CakePHP's updateAll() method does not perform any SQL escaping. The strings below cannot contain
			*	an apostrophe (e.g., O'Connell, O'Grady, etc.) or else the update will fail.
			*/
			$fields = array(
							'DataInProgress.CaseNum' 		=> "'$caseNum'", 
							'DataInProgress.CaseNam' 		=> "'$caseName'", 
							'DataInProgress.NumDef' 		=> "'$numDef'",
							'DataInProgress.State' 			=> "'$state'",
							'DataInProgress.FedDistrictLoc' => "'$fedDistLoc'",
							'DataInProgress.FedDistrictNum' => "'$fedDistNum'",
							'DataInProgress.JudgeName' 		=> "'$judgeName'",
							'DataInProgress.JudgeRace' 		=> "'$judgeRace'",
							'DataInProgress.JudgeGen' 		=> "'$judgeGen'",
							'DataInProgress.JudgeApptBy' 	=> "'$judgeApptBy'",
							'DataInProgress.JudgeTenure' 	=> "'$judgeTenure'",
							'DataInProgress.CaseSummary' 	=> "'$caseSummary'",
							'DataInProgress.LaborTraf' 		=> "'$laborTraf'",
							'DataInProgress.AdultSexTraf' 	=> "'$adultTraf'",
							'DataInProgress.MinorSexTraf' 	=> "'$minorTraf'",
							'DataInProgress.NumVic' 		=> "'$numVic'",
							'DataInProgress.NumVicMinor' 	=> "'$numVicMinor'",
							'DataInProgress.NumVicForeign' 	=> "'$numVicForeign'",
							'DataInProgress.NumVicFemale' 	=> "'$numVicFemale'"
			);

			if ($this->DataInProgress->updateAll($fields, array('DataInProgress.CaseNum' => $caseNumber)) ) {
				$this->redirect('/CaseReviews/review');
				print_r('Something went right.');
				
			} else {
				print_r('Something went wrong. Case information not saved.');
			}
		} else {
			$this->render('edit');
		}
	
	}

	/*
	*	Method name: getCase
	*		This method retrieves the case with the passed case number. It appends the case into one array with each defendant
	*		as an entry into the array. Case[Defendant], where sizeof(Defendant) is the number of defendants in that case.
	*		The method then returns the case.
	*
	*/
	public function getCase($caseNumber) {

		$case = $this->DataInProgress->find('all', array('conditions' => array('DataInProgress.CaseNum' => $caseNumber)));
		return $case;
	}

	/*
	*	Method name: defendant
	*		This method takes a defendant name, DOB, and case # passed to it and renders
	*		a view with the defendant's details. The updated info is then saved to the DataInProgress
	*		table with the review flag set. 
	*
	*/
	public function editDefendant($defArray) {

		$string = explode("|", $defArray);

		if (count($string) == 3) {
			$defLast = $string[0];
			$defFirst = $string[1];
			$caseNumber = $string[2];
			$case = $this->DataInProgress->find('first', array(
														'conditions' => array(
																			'DataInProgress.CaseNum' => $caseNumber, 
																			'DataInProgress.DefFirst' => $defFirst, 
																			'DataInProgress.DefLast' => $defLast
																			),
														)
												);
			$caseId = $case['DataInProgress']['id'];
			$this->set('case', $case);
		} else {
			//Redirect to error page?
			print_r('Invalid arguments. Missing defendant name or case number.');
		}

		if ($this->request->is('post')) {

			$this->DataInProgress->clear();
			$this->request->data['DataInProgress']['id'] = $caseId;

			if ($this->DataInProgress->save($this->request->data)) {
				$this->redirect(array('action' => 'edit', $caseNumber));
				print_r('Save successful!');
			} else {
				print_r('An error occurred. The defendant was not saved.');
			}
		}

	}

	public function autoComplete() {
		$this->autoRender = false;

		$term = trim(strip_tags($_GET['term']));

		$data = $this->DataInProgress->find('all', array(
			'fields' => array(
					'DISTINCT CaseNum',
					'CaseNam'
				),
			'conditions' => array(
				'OR' => array(
					'DataInProgress.CaseNum LIKE' => '%' . $term . '%',
					'DataInProgress.CaseNam LIKE' => '%' . $term .'%'
				)
			)
		));

		$vals = array();
		$index = 0;
		foreach ($data as $d) {
			if ($index++ > 9) break;
			array_push($vals, array(
					'label'=> $d['DataInProgress']['CaseNum'] . ' / ' . $d['DataInProgress']['CaseNam'],
					'value'=> $d['DataInProgress']['CaseNum']
				)
			);
		}

		echo json_encode($vals);
	}	

}

?>