<?php

class UploadsController extends AppController {

	/**
	 * Controller name
	 */
	public $name = 'Uploads';

	/**
	 * This controller does not use a model
	 */
	public $uses = array('AggregateSentence', 'ArrestChargeDetail', 'CaseHasDefendant', 'CaseHasOrganizedCrimeGroup', 'CaseObject', 'Charge', 'Defendant', 'Judge', 'OrganizedCrimeGroup', 'Victim');

	public $helpers = array('Html', 'Form');

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

							// get the case number [Formt: CASE_ID <DOT> DEF_ID]
							$case_id = explode(".",$data[0])[0];

							/** 
							 * Judge Section
							 * 
							 * Check to see if a new judge needs to be
							 * created based on the name of the judge.
							 * 
							 * *NOTE*: Possibly need
							 * to change to add conditions for other
							 * properties if there are multiple judges with
							 * similar names
							 */
							if (!$this->Judge->find('first', array('conditions' => array('Judge.name' => $data[10])))) {

								// If there needs to be a new judge,
								// get the data according to document
								$judge_data = array(
									'Name' => $data[10],
									'Race' => intval($data[11]),
									'Gender' => intval($data[12]),
									'Tenure' => $data[13],
									'AppointedBy' => intval($data[14])
								);

								// Create a new Judge model
								$this->Judge->create();

								// Save the data to this Judge model
								$this->Judge->save($judge_data);

								// Store the JudgeId for later use
								$judge_id = $this->Judge->id;

								// Clear the model to allow for other Judge
								// models to be created
								$this->Judge->clear();
							} else {

								// Get the JudgeId of the existing Judge
								// model and save for future use
								$judge_id = $this->Judge->find('first', array('conditions' => array('Judge.name' => $data[10])))["Judge"]["JudgeId"];
							}

							/**
							 * Case Section
							 *
							 * Check to see if a new CaseObject needs to
							 * be added to the database based on CaseId
							 */
							if (!$this->CaseObject->exists($case_id)) {

								/**
							 	 * Victims Section
							 	 *
							 	 * Create a new Victim object for the
							 	 * database if there is victims data.
							 	 *
							 	 * *NOTE*:
							 	 * This is inside of CaseObject because
							 	 * we only need to create a new Victims
							 	 * object if we have a new CaseObject
							 	 */
								if ($data[239] !== "") {

									$victim_data = array(
										'Total' => intval($data[239]),
										'Minor' => intval($data[240]),
										'Foreign' => intval($data[241]),
										'Female' => intval($data[242])
									);

									$this->Victim->create();
									$this->Victim->save($victim_data);
									$victim_id = $this->Victim->id;
									$this->Victim->clear();
								}

								$case_data = array(
									'CaseId' => $case_id,
									'Name' => $data[5],
									'Number' => $data[6],
									'Summary' => $data[15],
									'Num_Defendants' => intval($data[7]),
									'State' => $data[8],
									'FederalDistrict' => intval($data[9]),
									'JudgeId' => $judge_id,
									'VictimsId' => $victim_id
								);

								$this->CaseObject->create();
								$this->CaseObject->save($case_data);
								$case_id = $this->CaseObject->id;
								$this->CaseObject->clear();
							}

							/**
							 * Defendant Section
							 *
							 * Check to see if new Defendant needs to
							 * be added to the database based on defendant
							 * name
							 */
							if (!$this->Defendant->find('first', array('conditions' => array('Defendant.firstname' => $data[3], 'Defendant.lastname' => $data[2], 'Defendant.birthdate' => date('Y-m-d', strtotime($data[18])))))) {

								$defendant_data = array(
									'Firstname' => $data[3],
									'Lastname' => $data[2],
									'Gender' => ($data[16] == "1"),
									'Race' => intval($data[17]),
									'BirthDate' => date("Y-m-d", strtotime($data[18]))
								);

								$this->Defendant->create();
								$this->Defendant->save($defendant_data);
								$defendant_id = $this->Defendant->id;
								$this->Defendant->clear();
							} else {
								$defendant_id = $this->Defendant->find('first', array('conditions' => array('Defendant.Firstname' => $data[3], 'Defendant.Lastname' => $data[2], 'Defendant.BirthDate' => date('Y-m-d', strtotime($data[18])))))["Defendant"]["DefendantId"];
							}

							if (!$this->CaseHasDefendant->find('first', array('conditions' => array('CaseHasDefendant.CaseId' => $case_id, 'CaseHasDefendant.DefendantId' => $defendant_id)))) {	
								
								/**
								 * Adds this defendant to this case
								 */
								$chd_data = array(
									'CaseId' => $case_id,
									'DefendantId' => $defendant_id
								);

								$this->CaseHasDefendant->create();
								$this->CaseHasDefendant->save($chd_data);
								$this->CaseHasDefendant->clear();
							}

							/**
							 * ArrestChargeDetail Section
							 *
							 * Create a new ArrestChargeDetail object
							 * for each defendant in each case (each row)
							 */
							$acd_data = array(
								'ChargeDate' => date('Y-m-d', strtotime($data[20])),
								'ArrestDate' => date('Y-m-d', strtotime($data[21])),
								'Detained' => ($data[22] == "1"),
								'BailType' => intval($data[23]),
								'BailAmount' => intval($data[24]),
								'LaborTraf' => ($data[25] == "1"),
								'AdultSexTraf' => ($data[26] == "1"),
								'MinorSexTraf' => ($data[27] == "1"),
								'Role' => ($data[28] == "1"),
								'Fel_C' => intval($data[29]),
								'Fel_S' => intval($data[30]),
								'CHD_CaseId' => $case_id,
								'CHD_DefendantId' => $defendant_id
							);

							$this->ArrestChargeDetail->create();
							$this->ArrestChargeDetail->save($acd_data);
							$acd_id = $this->ArrestChargeDetail->id;
							$this->ArrestChargeDetail->clear();
							
							/**
							 * Charge Section
							 *
							 * Loops through each of the charges and
							 * determines whether a Charge object
							 * should be added to the database
							 */
							$column = 31;
							$statute_index = 0;
							for ($column = 31; $column < 230; $column+=10) {
								if ($data[$column] !== "0") {
									$charge_data = array(
										'Statute' => $statutes["$statute_index"],
										'Counts' => intval($data[$column+1]),
										'CountsNolleProssed' => intval($data[$column+2]),
										'PleaDismissed' => intval($data[$column+3]),
										'PleaGuilty' => intval($data[$column+4]),
										'TrialGuilty' => intval($data[$column+5]),
										'TrialNotGuilty' => intval($data[$column+6]),
										'Fines' => intval($data[$column+7]),
										'Sentence' => intval($data[$column+8]),
										'Probation' => intval($data[$column+9]),
										'ACDId' => $acd_id,
										'ACD_CHD_CaseId' => $case_id,
										'ACD_CHD_DefendantId' => $defendant_id
									);

									$this->Charge->create();
									$this->Charge->save($charge_data);
									$charge_id = $this->Charge->id;
									$this->Charge->clear();
								}
								$statute_index++;
							}

							/**
							 * AggregateSentence Section
							 *
							 * Adds an AggregateSentence object to the
							 * database
							 */
							if ($data[231] !== '') {
								$sentence_data = array(
									'DateTerminated' => date('Y-m-d', strtotime($data[231])),
									'Date' => date('Y-m-d', strtotime($data[232])),
									'Total' => intval($data[233]),
									'Restitution' => intval($data[234]),
									'AssetForfeit' => ($data[235] == "1"),
									'Appeal' => ($data[236] == "1"),
									'SupervisedRelease' => intval($data[237]),
									'Probation' => intval($data[238]),
									'CHD_CaseId' => $case_id,
									'CHD_DefendantId' => $defendant_id,
								);

								$this->AggregateSentence->create();
								$this->AggregateSentence->save($sentence_data);
								$sentence_id = $this->AggregateSentence->id;
								$this->AggregateSentence->clear();
							}

							/**
							 * OrganizedCrimeGroup Section
							 *
							 * Checks to see if the first
							 * OrganizedCrimeGroup exists and adds
							 * it to the db if not.
							 */
							if ($data[243] !== '') {
								if (!$this->OrganizedCrimeGroup->find('first', array('conditions' => array('OrganizedCrimeGroup.Name' => $data[243])))) {
									$ocg_data = array(
										'Name' => $data[243],
										'Size' => intval($data[244]),
										'Race' => intval($data[245]),
										'Scope' => intval($data[246])
									);

									$this->OrganizedCrimeGroup->create();
									$this->OrganizedCrimeGroup->save($ocg_data);
									$ocg_id = $this->OrganizedCrimeGroup->id;
									$this->OrganizedCrimeGroup->clear();
								} else {
									$ocg_id = $this->OrganizedCrimeGroup->find('first', array('conditions' => array('OrganizedCrimeGroup.Name' => $data[243])))["OrganizedCrimeGroup"]["OCGId"];
								}

								if (!$this->CaseHasOrganizedCrimeGroup->find('first', array('conditions' => array('CaseHasOrganizedCrimeGroup.CaseId' => $case_id, 'CaseHasOrganizedCrimeGroup.OCGId' => $ocg_id)))) {
									
									// Adds this OCG to this case
									$chocg_data = array(
										'CaseId' => $case_id,
										'OCGId' => $ocg_id,
									);

									$this->CaseHasOrganizedCrimeGroup->create();
									$this->CaseHasOrganizedCrimeGroup->save($chocg_data);
									$this->CaseHasOrganizedCrimeGroup->clear();
								}
							}

							// second OrganizedCrimeGroup
							if ($data[247] !== '') {
								if (!$this->OrganizedCrimeGroup->find('first', array('conditions' => array('OrganizedCrimeGroup.Name' => $data[247])))) {
									$ocg_data = array(
										'Name' => $data[247],
										'Size' => intval($data[248]),
										'Race' => intval($data[249]),
										'Scope' => intval($data[250])
									);

									$this->OrganizedCrimeGroup->create();
									$this->OrganizedCrimeGroup->save($ocg_data);
									$ocg_id = $this->OrganizedCrimeGroup->id;
									$this->OrganizedCrimeGroup->clear();
								} else {
									$ocg_id = $this->OrganizedCrimeGroup->find('first', array('conditions' => array('OrganizedCrimeGroup.Name' => $data[247])))["OrganizedCrimeGroup"]["OCGId"];
								}

								if (!$this->CaseHasOrganizedCrimeGroup->find('first', array('conditions' => array('CaseHasOrganizedCrimeGroup.CaseId' => $case_id, 'CaseHasOrganizedCrimeGroup.OCGId' => $ocg_id)))) {
									
									// Adds this OCG to this case
									$chocg_data = array(
										'CaseId' => $case_id,
										'OCGId' => $ocg_id,
									);

									$this->CaseHasOrganizedCrimeGroup->create();
									$this->CaseHasOrganizedCrimeGroup->save($chocg_data);
									$this->CaseHasOrganizedCrimeGroup->clear();
								}
							}
						}
						$row++;
					}
				}
				fclose($file);
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash('File upload failed!');
			}
		}
		$this->render('add');
	}
}