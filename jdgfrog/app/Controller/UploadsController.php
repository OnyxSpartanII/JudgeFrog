<?php

class UploadsController extends AppController {

	/**
	 * Controller name
	 */
	public $name = 'Uploads';

	/**
	 * This controller does not use a model
	 */
	public $uses = array('DataInProgress');

	public $helpers = array('Html', 'Form');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add','receipt');
	}

	public function add() {

		// if form is submitted via HTTP/1.1 POST
		if ($this->request->is('post')) {

			// create filename variable to file which will be saved at
			// /app/webroot/files/
			$filename = "./files/" . $this->data['Uploads']['file']['name'];
			
			// copy uploaded file to $filename
			if (move_uploaded_file($this->data['Uploads']['file']['tmp_name'],$filename)) {

				// Set flash to alert users of current progress
				$this->Session->setFlash('File uploaded successfully! Parsing file...');

				// initialize $row to 0
				$row = 0;

				// initialize $statutes array
				$statutes = array();

				// initialize $receipt array
				$receipt = array();

				// open up file into $file if the file exists
				if (($file = fopen($filename,"r")) !== FALSE) {

					// continually read the rows of the CSV and store
					// into $data variable
					while (($data = fgetcsv($file)) !== FALSE) {
						
						// the number of columns in each row
						// not needed necessarily
						$num = count($data);

						if ($row == 2) {

							$column = 31;
							for ($column = 31; $column < 231; $column+=10) {
								array_push($statutes, $data[$column]);
							}

						} else if ($row >= 4) {
							// Every row after row #4 contains data which needs to be input to database

							$index = 2;

							$info = array(
								'DefLast' => $data[$index++],
								'DefFirst' => $data[$index++],
								'Alias' => $data[$index++],
								'CaseNam' => $data[$index++],
								'CaseNum' => $data[$index++],
								'NumDef' => intval($data[$index++]),
								'State' => $data[$index++],
								'FedDistrictLoc' => $data[$index++],
								'FedDistrictNum' => intval($data[$index++]),
								'JudgeName' => $data[$index++],
								'JudgeRace' => intval($data[$index++]),
								'JudgeGen' => ($data[$index++] == '1'),
								'JudgeTenure' => date('Y-m-d',strtotime($data[$index++])),
								'JudgeApptBy' => ($data[$index++] == '1'),
								'CaseSummary' => $data[$index++],
								'DefGender' => ($data[$index++] == '1'),
								'DefRace' => intval($data[$index++]),
								'DefBirthdate' => date('Y-m-d',strtotime($data[$index++])),
								'DefArrestAge' => intval($data[$index++]),
								'ChargeDate' => date('Y-m-d',strtotime($data[$index++])),
								'ArrestDate' => date('Y-m-d',strtotime($data[$index++])),
								'Detained' => ($data[$index++] == '1'),
								'BailType' => intval($data[$index++]),
								'BailAmount' => intval($data[$index++]),
								'LaborTraf' => ($data[$index++] == '1'),
								'AdultSexTraf' => ($data[$index++] == '1'),
								'MinorSexTraf' => ($data[$index++] == '1'),
								'Role' => ($data[$index++] == '1'),
								'FelCharged' => intval($data[$index++]),
								'FelSentenced' => intval($data[$index++]),

								'1961to1968' => ($data[$index++] == '1'),
								'Counts1916to1968' => intval($data[$index++]),
								'CountsNP1916to1968' => intval($data[$index++]),
								'PleaDismissed1916to1968' => intval($data[$index++]),
								'PleaGuilty1916to1968' => intval($data[$index++]),
								'TrialGuilty1916to1968' => intval($data[$index++]),
								'TrialNG1916to1968' => intval($data[$index++]),
								'Fines1916to1968' => intval($data[$index++]),
								'Sent1916to1968' => intval($data[$index++]),
								'Prob1916to1968' => intval($data[$index++]),

								'1028' => ($data[$index++] == '1'),
								'Counts1028' => intval($data[$index++]),
								'CountsNP1028' => intval($data[$index++]),
								'PleaDismissed1028' => intval($data[$index++]),
								'PleaGuilty1028' => intval($data[$index++]),
								'TrialGuilty1028' => intval($data[$index++]),
								'TrialNG1028' => intval($data[$index++]),
								'Fines1028' => intval($data[$index++]),
								'Sent1028' => intval($data[$index++]),
								'Prob1028' => intval($data[$index++]),

								'1351' => ($data[$index++] == '1'),
								'Counts1351' => intval($data[$index++]),
								'CountsNP1351' => intval($data[$index++]),
								'PleaDismissed1351' => intval($data[$index++]),
								'PleaGuilty1351' => intval($data[$index++]),
								'TrialGuilty1351' => intval($data[$index++]),
								'TrialNG1351' => intval($data[$index++]),
								'Fines1351' => intval($data[$index++]),
								'Sent1351' => intval($data[$index++]),
								'Prob1351' => intval($data[$index++]),

								'1425' => ($data[$index++] == '1'),
								'Counts1425' => intval($data[$index++]),
								'CountsNP1425' => intval($data[$index++]),
								'PleaDismissed1425' => intval($data[$index++]),
								'PleaGuilty1425' => intval($data[$index++]),
								'TrialGuilty1425' => intval($data[$index++]),
								'TrialNG1425' => intval($data[$index++]),
								'Fines1425' => intval($data[$index++]),
								'Sent1425' => intval($data[$index++]),
								'Prob1425' => intval($data[$index++]),

								'1426' => ($data[$index++] == '1'),
								'Counts1426' => intval($data[$index++]),
								'CountsNP1426' => intval($data[$index++]),
								'PleaDismissed1426' => intval($data[$index++]),
								'PleaGuilty1426' => intval($data[$index++]),
								'TrialGuilty1426' => intval($data[$index++]),
								'TrialNG1426' => intval($data[$index++]),
								'Fines1426' => intval($data[$index++]),
								'Sent1426' => intval($data[$index++]),
								'Prob1426' => intval($data[$index++]),

								'1461to1465' => ($data[$index++] == '1'),
								'Counts1461to1465' => intval($data[$index++]),
								'CountsNP1461to1465' => intval($data[$index++]),
								'PleaDismissed1461to1465' => intval($data[$index++]),
								'PleaGuilty1461to1465' => intval($data[$index++]),
								'TrialGuilty1461to1465' => intval($data[$index++]),
								'TrialNG1461to1465' => intval($data[$index++]),
								'Fines1461to1465' => intval($data[$index++]),
								'Sent1461to1465' => intval($data[$index++]),
								'Prob1461to1465' => intval($data[$index++]),

								'1512' => ($data[$index++] == '1'),
								'Counts1512' => intval($data[$index++]),
								'CountsNP1512' => intval($data[$index++]),
								'PleaDismissed1512' => intval($data[$index++]),
								'PleaGuilty1512' => intval($data[$index++]),
								'TrialGuilty1512' => intval($data[$index++]),
								'TrialNG1512' => intval($data[$index++]),
								'Fines1512' => intval($data[$index++]),
								'Sent1512' => intval($data[$index++]),
								'Prob1512' => intval($data[$index++]),

								'1542to1543' => ($data[$index++] == '1'),
								'Counts1542to1543' => intval($data[$index++]),
								'CountsNP1542to1543' => intval($data[$index++]),
								'PleaDismissed1542to1543' => intval($data[$index++]),
								'PleaGuilty1542to1543' => intval($data[$index++]),
								'TrialGuilty1542to1543' => intval($data[$index++]),
								'TrialNG1542to1543' => intval($data[$index++]),
								'Fines1542to1543' => intval($data[$index++]),
								'Sent1542to1543' => intval($data[$index++]),
								'Prob1542to1543' => intval($data[$index++]),

								'1546' => ($data[$index++] == '1'),
								'Counts1546' => intval($data[$index++]),
								'CountsNP1546' => intval($data[$index++]),
								'PleaDismissed1546' => intval($data[$index++]),
								'PleaGuilty1546' => intval($data[$index++]),
								'TrialGuilty1546' => intval($data[$index++]),
								'TrialNG1546' => intval($data[$index++]),
								'Fines1546' => intval($data[$index++]),
								'Sent1546' => intval($data[$index++]),
								'Prob1546' => intval($data[$index++]),
								
								'1581to1588' => ($data[$index++] == '1'),
								'Counts1581to1588' => intval($data[$index++]),
								'CountsNP1581to1588' => intval($data[$index++]),
								'PleaDismissed1581to1588' => intval($data[$index++]),
								'PleaGuilty1581to1588' => intval($data[$index++]),
								'TrialGuilty1581to1588' => intval($data[$index++]),
								'TrialNG1581to1588' => intval($data[$index++]),
								'Fines1581to1588' => intval($data[$index++]),
								'Sent1581to1588' => intval($data[$index++]),
								'Prob1581to1588' => intval($data[$index++]),
								
								'1589' => ($data[$index++] == '1'),
								'Counts1589' => intval($data[$index++]),
								'CountsNP1589' => intval($data[$index++]),
								'PleaDismissed1589' => intval($data[$index++]),
								'PleaGuilty1589' => intval($data[$index++]),
								'TrialGuilty1589' => intval($data[$index++]),
								'TrialNG1589' => intval($data[$index++]),
								'Fines1589' => intval($data[$index++]),
								'Sent1589' => intval($data[$index++]),
								'Prob1589' => intval($data[$index++]),
								
								'1590' => ($data[$index++] == '1'),
								'Counts1590' => intval($data[$index++]),
								'CountsNP1590' => intval($data[$index++]),
								'PleaDismissed1590' => intval($data[$index++]),
								'PleaGuilty1590' => intval($data[$index++]),
								'TrialGuilty1590' => intval($data[$index++]),
								'TrialNG1590' => intval($data[$index++]),
								'Fines1590' => intval($data[$index++]),
								'Sent1590' => intval($data[$index++]),
								'Prob1590' => intval($data[$index++]),
								
								'1591' => ($data[$index++] == '1'),
								'Counts1591' => intval($data[$index++]),
								'CountsNP1591' => intval($data[$index++]),
								'PleaDismissed1591' => intval($data[$index++]),
								'PleaGuilty1591' => intval($data[$index++]),
								'TrialGuilty1591' => intval($data[$index++]),
								'TrialNG1591' => intval($data[$index++]),
								'Fines1591' => intval($data[$index++]),
								'Sent1591' => intval($data[$index++]),
								'Prob1591' => intval($data[$index++]),
								
								'1592' => ($data[$index++] == '1'),
								'Counts1592' => intval($data[$index++]),
								'CountsNP1592' => intval($data[$index++]),
								'PleaDismissed1592' => intval($data[$index++]),
								'PleaGuilty1592' => intval($data[$index++]),
								'TrialGuilty1592' => intval($data[$index++]),
								'TrialNG1592' => intval($data[$index++]),
								'Fines1592' => intval($data[$index++]),
								'Sent1592' => intval($data[$index++]),
								'Prob1592' => intval($data[$index++]),
								
								'2251' => ($data[$index++] == '1'),
								'Counts2251' => intval($data[$index++]),
								'CountsNP2251' => intval($data[$index++]),
								'PleaDismissed2251' => intval($data[$index++]),
								'PleaGuilty2251' => intval($data[$index++]),
								'TrialGuilty2251' => intval($data[$index++]),
								'TrialNG2251' => intval($data[$index++]),
								'Fines2251' => intval($data[$index++]),
								'Sent2251' => intval($data[$index++]),
								'Prob2251' => intval($data[$index++]),
							
								'2252' => ($data[$index++] == '1'),
								'Counts2252' => intval($data[$index++]),
								'CountsNP2252' => intval($data[$index++]),
								'PleaDismissed2252' => intval($data[$index++]),
								'PleaGuilty2252' => intval($data[$index++]),
								'TrialGuilty2252' => intval($data[$index++]),
								'TrialNG2252' => intval($data[$index++]),
								'Fines2252' => intval($data[$index++]),
								'Sent2252' => intval($data[$index++]),
								'Prob2252' => intval($data[$index++]),
								
								'2260' => ($data[$index++] == '1'),
								'Counts2260' => intval($data[$index++]),
								'CountsNP2260' => intval($data[$index++]),
								'PleaDismissed2260' => intval($data[$index++]),
								'PleaGuilty2260' => intval($data[$index++]),
								'TrialGuilty2260' => intval($data[$index++]),
								'TrialNG2260' => intval($data[$index++]),
								'Fines2260' => intval($data[$index++]),
								'Sent2260' => intval($data[$index++]),
								'Prob2260' => intval($data[$index++]),
								
								'2421to2424' => ($data[$index++] == '1'),
								'Counts2421to2424' => intval($data[$index++]),
								'CountsNP2421to2424' => intval($data[$index++]),
								'PleaDismissed2421to2424' => intval($data[$index++]),
								'PleaGuilty2421to2424' => intval($data[$index++]),
								'TrialGuilty2421to2424' => intval($data[$index++]),
								'TrialNG2421to2424' => intval($data[$index++]),
								'Fines2421to2424' => intval($data[$index++]),
								'Sent2421to2424' => intval($data[$index++]),
								'Prob2421to2424' => intval($data[$index++]),
								
								'1324' => ($data[$index++] == '1'),
								'Counts1324' => intval($data[$index++]),
								'CountsNP1324' => intval($data[$index++]),
								'PleaDismissed1324' => intval($data[$index++]),
								'PleaGuilty1324' => intval($data[$index++]),
								'TrialGuilty1324' => intval($data[$index++]),
								'TrialNG1324' => intval($data[$index++]),
								'Fines1324' => intval($data[$index++]),
								'Sent1324' => intval($data[$index++]),
								'Prob1324' => intval($data[$index++]),
								
								'1328' => ($data[$index++] == '1'),
								'Counts1328' => intval($data[$index++]),
								'CountsNP1328' => intval($data[$index++]),
								'PleaDismissed1328' => intval($data[$index++]),
								'PleaGuilty1328' => intval($data[$index++]),
								'TrialGuilty1328' => intval($data[$index++]),
								'TrialNG1328' => intval($data[$index++]),
								'Fines1328' => intval($data[$index++]),
								'Sent1328' => intval($data[$index++]),
								'Prob1328' => intval($data[$index++]),

								'DateTerm' => date('Y-m-d',strtotime($data[$index++])),
								'SentDate' => date('Y-m-d',strtotime($data[$index++])),
								'TotalSentence' => intval($data[$index++]),
								'Restitution' => intval($data[$index++]),
								'AssetForfeit' => ($data[$index++] == '1'),
								'Appeal' => ($data[$index++] == '1'),
								'SupRelease' => intval($data[$index++]),
								'Probation' => intval($data[$index++]),
								'NumVic' => intval($data[$index++]),
								'NumVicMinor' => intval($data[$index++]),
								'NumVicForeign' => intval($data[$index++]),
								'NumVicFemale' => intval($data[$index++]),
								'OCName1' => $data[$index++],
								'OCType1' => intval($data[$index++]),
								'OCRace1' => intval($data[$index++]),
								'OCScope1' => intval($data[$index++]),
								'OCName2' => $data[$index++],
								'OCType2' => intval($data[$index++]),
								'OCRace2' => intval($data[$index++]),
								'OCScope2' => intval($data[$index++]),
								'SubmittedForReview' => true
							);
							print_r($info);
							$this->Session->setFlash('test');
							$this->DataInProgress->create();
							$this->DataInProgress->save($info);
							$this->DataInProgress->clear();
						}
						$row++;
					}
				}
				fclose($file);
				$this->set('receipt',$receipt);
				$this->render('receipt');
			} else {
				$this->Session->setFlash('File upload failed!');
			}
		}
	}
}