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

				// initialize $row to 0
				$row = 0;

				// initialize total array
				$total = array();

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

						if ($row >= 4) {
							// Every row after row #4 contains data which needs to be input to database

							echo date('n/j/Y', strtotime($data[21])) . "<br/>\n";

							$index = 2;

							$info = array(
								'DefLast' => $data[$index++],
								'DefFirst' => $data[$index++],
								'Alias' => $data[$index++],
								'CaseNam' => $data[$index++],
								'CaseNum' => $data[$index++],
								'NumDef' => $data[$index++],
								'State' => $data[$index++],
								'FedDistrictLoc' => $data[$index++],
								'FedDistrictNum' => $data[$index++],
								'JudgeName' => $data[$index++],
								'JudgeRace' => $data[$index++],
								'JudgeGen' => $data[$index++],
								'JudgeTenure' => $data[$index++],
								'JudgeApptBy' => $data[$index++],
								'CaseSummary' => $data[$index++],
								'DefGender' => $data[$index++],
								'DefRace' => $data[$index++],
								'DefBirthdate' => $data[$index++],
								'DefArrestAge' => $data[$index++],
								'ChargeDate' => date('n/j/Y', strtotime($data[$index++])),
								'ArrestDate' => date('n/j/Y', strtotime($data[$index++])),
								'Detained' => $data[$index++],
								'BailType' => $data[$index++],
								'BailAmount' => $data[$index++],
								'LaborTraf' => $data[$index++],
								'AdultSexTraf' => $data[$index++],
								'MinorSexTraf' => $data[$index++],
								'Role' => $data[$index++],
								'FelCharged' => $data[$index++],
								'FelSentenced' => $data[$index++],

								'1916to1968' => $data[$index++],
								'Counts1916to1968' => $data[$index++],
								'CountsNP1916to1968' => $data[$index++],
								'PleaDismissed1916to1968' => $data[$index++],
								'PleaGuilty1916to1968' => $data[$index++],
								'TrialGuilty1916to1968' => $data[$index++],
								'TrialNG1916to1968' => $data[$index++],
								'Fines1916to1968' => $data[$index++],
								'Sent1916to1968' => $data[$index++],
								'Prob1916to1968' => $data[$index++],

								'1028' => $data[$index++],
								'Counts1028' => $data[$index++],
								'CountsNP1028' => $data[$index++],
								'PleaDismissed1028' => $data[$index++],
								'PleaGuilty1028' => $data[$index++],
								'TrialGuilty1028' => $data[$index++],
								'TrialNG1028' => $data[$index++],
								'Fines1028' => $data[$index++],
								'Sent1028' => $data[$index++],
								'Prob1028' => $data[$index++],

								'1351' => $data[$index++],
								'Counts1351' => $data[$index++],
								'CountsNP1351' => $data[$index++],
								'PleaDismissed1351' => $data[$index++],
								'PleaGuilty1351' => $data[$index++],
								'TrialGuilty1351' => $data[$index++],
								'TrialNG1351' => $data[$index++],
								'Fines1351' => $data[$index++],
								'Sent1351' => $data[$index++],
								'Prob1351' => $data[$index++],

								'1425' => $data[$index++],
								'Counts1425' => $data[$index++],
								'CountsNP1425' => $data[$index++],
								'PleaDismissed1425' => $data[$index++],
								'PleaGuilty1425' => $data[$index++],
								'TrialGuilty1425' => $data[$index++],
								'TrialNG1425' => $data[$index++],
								'Fines1425' => $data[$index++],
								'Sent1425' => $data[$index++],
								'Prob1425' => $data[$index++],

								'1426' => $data[$index++],
								'Counts1426' => $data[$index++],
								'CountsNP1426' => $data[$index++],
								'PleaDismissed1426' => $data[$index++],
								'PleaGuilty1426' => $data[$index++],
								'TrialGuilty1426' => $data[$index++],
								'TrialNG1426' => $data[$index++],
								'Fines1426' => $data[$index++],
								'Sent1426' => $data[$index++],
								'Prob1426' => $data[$index++],

								'1461to1465' => $data[$index++],
								'Counts1461to1465' => $data[$index++],
								'CountsNP1461to1465' => $data[$index++],
								'PleaDismissed1461to1465' => $data[$index++],
								'PleaGuilty1461to1465' => $data[$index++],
								'TrialGuilty1461to1465' => $data[$index++],
								'TrialNG1461to1465' => $data[$index++],
								'Fines1461to1465' => $data[$index++],
								'Sent1461to1465' => $data[$index++],
								'Prob1461to1465' => $data[$index++],

								'1512' => $data[$index++],
								'Counts1512' => $data[$index++],
								'CountsNP1512' => $data[$index++],
								'PleaDismissed1512' => $data[$index++],
								'PleaGuilty1512' => $data[$index++],
								'TrialGuilty1512' => $data[$index++],
								'TrialNG1512' => $data[$index++],
								'Fines1512' => $data[$index++],
								'Sent1512' => $data[$index++],
								'Prob1512' => $data[$index++],

								'1542to1543' => $data[$index++],
								'Counts1542to1543' => $data[$index++],
								'CountsNP1542to1543' => $data[$index++],
								'PleaDismissed1542to1543' => $data[$index++],
								'PleaGuilty1542to1543' => $data[$index++],
								'TrialGuilty1542to1543' => $data[$index++],
								'TrialNG1542to1543' => $data[$index++],
								'Fines1542to1543' => $data[$index++],
								'Sent1542to1543' => $data[$index++],
								'Prob1542to1543' => $data[$index++],

								'1546' => $data[$index++],
								'Counts1546' => $data[$index++],
								'CountsNP1546' => $data[$index++],
								'PleaDismissed1546' => $data[$index++],
								'PleaGuilty1546' => $data[$index++],
								'TrialGuilty1546' => $data[$index++],
								'TrialNG1546' => $data[$index++],
								'Fines1546' => $data[$index++],
								'Sent1546' => $data[$index++],
								'Prob1546' => $data[$index++],
								
								'1581to1588' => $data[$index++],
								'Counts1581to1588' => $data[$index++],
								'CountsNP1581to1588' => $data[$index++],
								'PleaDismissed1581to1588' => $data[$index++],
								'PleaGuilty1581to1588' => $data[$index++],
								'TrialGuilty1581to1588' => $data[$index++],
								'TrialNG1581to1588' => $data[$index++],
								'Fines1581to1588' => $data[$index++],
								'Sent1581to1588' => $data[$index++],
								'Prob1581to1588' => $data[$index++],
								
								'1589' => $data[$index++],
								'Counts1589' => $data[$index++],
								'CountsNP1589' => $data[$index++],
								'PleaDismissed1589' => $data[$index++],
								'PleaGuilty1589' => $data[$index++],
								'TrialGuilty1589' => $data[$index++],
								'TrialNG1589' => $data[$index++],
								'Fines1589' => $data[$index++],
								'Sent1589' => $data[$index++],
								'Prob1589' => $data[$index++],
								
								'1590' => $data[$index++],
								'Counts1590' => $data[$index++],
								'CountsNP1590' => $data[$index++],
								'PleaDismissed1590' => $data[$index++],
								'PleaGuilty1590' => $data[$index++],
								'TrialGuilty1590' => $data[$index++],
								'TrialNG1590' => $data[$index++],
								'Fines1590' => $data[$index++],
								'Sent1590' => $data[$index++],
								'Prob1590' => $data[$index++],
								
								'1591' => $data[$index++],
								'Counts1591' => $data[$index++],
								'CountsNP1591' => $data[$index++],
								'PleaDismissed1591' => $data[$index++],
								'PleaGuilty1591' => $data[$index++],
								'TrialGuilty1591' => $data[$index++],
								'TrialNG1591' => $data[$index++],
								'Fines1591' => $data[$index++],
								'Sent1591' => $data[$index++],
								'Prob1591' => $data[$index++],
								
								'1592' => $data[$index++],
								'Counts1592' => $data[$index++],
								'CountsNP1592' => $data[$index++],
								'PleaDismissed1592' => $data[$index++],
								'PleaGuilty1592' => $data[$index++],
								'TrialGuilty1592' => $data[$index++],
								'TrialNG1592' => $data[$index++],
								'Fines1592' => $data[$index++],
								'Sent1592' => $data[$index++],
								'Prob1592' => $data[$index++],
								
								'2251' => $data[$index++],
								'Counts2251' => $data[$index++],
								'CountsNP2251' => $data[$index++],
								'PleaDismissed2251' => $data[$index++],
								'PleaGuilty2251' => $data[$index++],
								'TrialGuilty2251' => $data[$index++],
								'TrialNG2251' => $data[$index++],
								'Fines2251' => $data[$index++],
								'Sent2251' => $data[$index++],
								'Prob2251' => $data[$index++],
							
								'2252' => $data[$index++],
								'Counts2252' => $data[$index++],
								'CountsNP2252' => $data[$index++],
								'PleaDismissed2252' => $data[$index++],
								'PleaGuilty2252' => $data[$index++],
								'TrialGuilty2252' => $data[$index++],
								'TrialNG2252' => $data[$index++],
								'Fines2252' => $data[$index++],
								'Sent2252' => $data[$index++],
								'Prob2252' => $data[$index++],
								
								'2260' => $data[$index++],
								'Counts2260' => $data[$index++],
								'CountsNP2260' => $data[$index++],
								'PleaDismissed2260' => $data[$index++],
								'PleaGuilty2260' => $data[$index++],
								'TrialGuilty2260' => $data[$index++],
								'TrialNG2260' => $data[$index++],
								'Fines2260' => $data[$index++],
								'Sent2260' => $data[$index++],
								'Prob2260' => $data[$index++],
								
								'2421to2424' => $data[$index++],
								'Counts2421to2424' => $data[$index++],
								'CountsNP2421to2424' => $data[$index++],
								'PleaDismissed2421to2424' => $data[$index++],
								'PleaGuilty2421to2424' => $data[$index++],
								'TrialGuilty2421to2424' => $data[$index++],
								'TrialNG2421to2424' => $data[$index++],
								'Fines2421to2424' => $data[$index++],
								'Sent2421to2424' => $data[$index++],
								'Prob2421to2424' => $data[$index++],
								
								'1324' => $data[$index++],
								'Counts1324' => $data[$index++],
								'CountsNP1324' => $data[$index++],
								'PleaDismissed1324' => $data[$index++],
								'PleaGuilty1324' => $data[$index++],
								'TrialGuilty1324' => $data[$index++],
								'TrialNG1324' => $data[$index++],
								'Fines1324' => $data[$index++],
								'Sent1324' => $data[$index++],
								'Prob1324' => $data[$index++],
								
								'1328' => $data[$index++],
								'Counts1328' => $data[$index++],
								'CountsNP1328' => $data[$index++],
								'PleaDismissed1328' => $data[$index++],
								'PleaGuilty1328' => $data[$index++],
								'TrialGuilty1328' => $data[$index++],
								'TrialNG1328' => $data[$index++],
								'Fines1328' => $data[$index++],
								'Sent1328' => $data[$index++],
								'Prob1328' => $data[$index++],

								'DateTerm' => $data[$index++],
								'SentDate' => $data[$index++],
								'TotalSentence' => $data[$index++],
								'Restitution' => $data[$index++],
								'AssetForfeit' => $data[$index++],
								'Appeal' => $data[$index++],
								'SupRelease' => $data[$index++],
								'Probation' => $data[$index++],
								'NumVic' => $data[$index++],
								'NumVicMinor' => $data[$index++],
								'NumVicForeign' => $data[$index++],
								'NumVicFemale' => $data[$index++],
								'OCName1' => $data[$index++],
								'OCType1' => $data[$index++],
								'OCRace1' => $data[$index++],
								'OCScope1' => $data[$index++],
								'OCName2' => $data[$index++],
								'OCType2' => $data[$index++],
								'OCRace2' => $data[$index++],
								'OCScope2' => $data[$index++],
								'SubmittedForReview' => true
							);
							array_push($total, $info);
						}
						$row++;
					}
				}

				if ($this->DataInProgress->saveAll($total, array('validate' => 'first'))) {
					array_push($receipt, '<div class="receipt">Successfully inserted new information into database.');
					array_push($receipt, 'Added ' + sizeof($total) + ' new rows.');
				} else {
					array_push($receipt, '<div class="receipt">Failed to insert new information into database.');
					$invalid = $this->DataInProgress->invalidFields();
					$err_rows = array_keys($invalid);
					foreach ($err_rows as $row) {
						array_push($receipt, '<div class="receipt-row">Error in row ' . ($row+5));

						foreach($invalid[$row] as $err) {
							array_push($receipt, '<div class="receipt-row-error">' . $err[0] . '</div>');
						}

						array_push($receipt, '</div>');

					}
				}
				array_push($receipt, '</div>');
				fclose($file);
				$this->set('receipt',$receipt);
				$this->render('receipt');
			} else {
				// shouldnt be here.
			}
		}
	}
}