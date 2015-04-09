<!-- CaseReviewsController.php -->
<?php

class CaseReviewsController extends AppController {
	public $name = 'CaseReviews';

	public $uses = array('DataInProgress', 'Datum');

	public $case_info = array();

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('review');
	}

	public function review() {

    	$this->layout = 'admin_panel_layout';
		$this->set('title', 'Review - Admin Panel | Human Trafficking Data');
		$this->set('active', 'review');
		
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

	public function publishCase($index) {
		$case_info = $this->Session->read('case_info');

		$this->autoRender = false;

		$data = $this->DataInProgress->find('all', array('conditions' => array('DataInProgress.CaseNum' => $case_info[$index][1])));
		$this->DataInProgress->deleteAll(array('DataInProgress.CaseNum' => $case_info[$index][1]), false);
		$this->Datum->clear();

		foreach ($data as &$d) {
			$d['Datum'] = $d['DataInProgress'];
			unset($d['DataInProgress']);

			$this->Session->setFlash('Case Successfully Published!');
		}		

		$this->Datum->saveMany($data);
	}

	public function delete_case($CaseNum) {
		$this->DataInProgress->deleteAll(array('DataInProgress.CaseNum' => $CaseNum), false);
		$this->Session->setFlash('Case Successfully Deleted!');
		$this->redirect(array('controller' => 'CaseReviews', 'action' => 'review'));

	}

}

?>