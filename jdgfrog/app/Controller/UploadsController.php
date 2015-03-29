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

						$statutes = ['1961to1968', '1028', '1351',
								'1425', '1512', '1546', '1581to1588', '1589',
								'1590', '1591', '1592', '2252', '2260', '2421to2424',
								'1324', '1328'];

						if ($row >= 4) {
							// Every row after row #4 contains data which needs to be input to database
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
								'DefBirthdate' => (strrpos($data[$index], "/") ? explode("/",$data[$index++])[2] : $data[$index++]),
								'DefArrestAge' => $data[$index++],
								'ChargeDate' => ($data[$index++] != 0 ? date('Y-m-d h:i:s', strtotime($data[$index-1])) : 0),
								'ArrestDate' => ($data[$index++] != 0 ? date('Y-m-d h:i:s', strtotime($data[$index-1])) : 0),
								'Detained' => $data[$index++],
								'BailType' => $data[$index++],
								'BailAmount' => $data[$index++],
								'LaborTraf' => $data[$index++],
								'AdultSexTraf' => $data[$index++],
								'MinorSexTraf' => $data[$index++],
								'FelCharged' => $data[$index++],
								'FelSentenced' => $data[$index++]

							);

							foreach ($statutes as $s) {
								$info["S$s"] = $data[$index++];
								$info["Counts$s"] = $data[$index++];
								$info["CountsNP$s"] = $data[$index++];
								$info["PleaDismissed$s"] = $data[$index++];
								$info["PleaGuilty$s"] = $data[$index++];
								$info["TrialGuilty$s"] = $data[$index++];
								$info["TrialNG$s"] = $data[$index++];
								$info["Fines$s"] = $data[$index++];
								$info["Sent$s"] = $data[$index++];
								$info["Prob$s"] = $data[$index++];
							}

							$info['DateTerm'] = ($data[$index++] != 0 ? date('Y-m-d h:i:s', strtotime($data[$index-1])) : 0);
							$info['SentDate'] = ($data[$index++] != 0 ? date('Y-m-d h:i:s', strtotime($data[$index-1])) : 0);
							$info['TotalSentence'] = $data[$index++];
							$info['Restitution'] = $data[$index++];
							$info['AssetForfeit'] = $data[$index++];
							$info['SupRelease'] = $data[$index++];
							$info['Probation'] = $data[$index++];
							$info['NumVic'] = $data[$index++];
							$info['NumVicMinor'] = $data[$index++];
							$info['NumVicForeign'] = $data[$index++];
							$info['NumVicFemale'] = $data[$index++];
							$info['OCName1'] = $data[$index++];
							$info['OCType1'] = $data[$index++];
							$info['OCRace1'] = $data[$index++];
							$info['OCScope1'] = $data[$index++];
							$info['OCName2'] = $data[$index++];
							$info['OCType2'] = $data[$index++];
							$info['OCRace2'] = $data[$index++];
							$info['OCScope2'] = $data[$index++];

							array_push($total, $info);
						}
						$row++;
					}
				}

				if ($this->DataInProgress->saveAll($total, array('validate' => 'first'))) {
					array_push($receipt, '<div class="receipt success">Successfully inserted new information into database.');
					array_push($receipt, 'Added ' + sizeof($total) + ' new rows.');
				} else {
					array_push($receipt, '<div class="receipt not_success">Failed to insert new information into database.');
					$invalid = $this->DataInProgress->invalidFields();
					$err_rows = array_keys($invalid);
					foreach ($err_rows as $row) {
						array_push($receipt, '<div class="receipt-row not_success">Error in row ' . ($row+5));

						foreach($invalid[$row] as $err) {
							array_push($receipt, '<div class="receipt-row-error not_success">' . $err[0] . '</div>');
						}

						array_push($receipt, '</div>');

					}
				}
				array_push($receipt, '</div>');
				fclose($file);
				// $this->set('receipt',$receipt);
				// $this->render('receipt');
				foreach ($receipt as $r) {
										
										// echo $r;
					echo '<div id="echmsg">', $r, '</div>';
										$this->Session->setFlash(''.$r);
										// $this->redirect('/CaseSessions/create_case_index');
									}
			} else {
				// shouldnt be here.
			}
		}
	}
}