<?php

class UploadsController extends AppController {

	/**
	 * Controller name
	 */
	public $name = 'Uploads';

	/**
	 * This controller does not use a model
	 */
	public $uses = array('AggregateSentence', 'ArrestChargeDetail', 'CaseHasDefendant', 'CaseHasOrganizedCrimeGroup', 'CaseObject', 'Defendant', 'Judge', 'OrganizedCrimeGroup', 'Victim');

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

				// open up file into $file if the file exists
				if (($file = fopen($filename,"r")) !== FALSE) {

					// continually read the rows of the CSV and store
					// into $data variable
					while (($data = fgetcsv($file)) !== FALSE) {
						
						// the number of columns in each row
						// not needed necessarily
						$num = count($data);

						if ($row == 1) {
							///TODO: Parse this row to create an array of different statues
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
									'Race' => $data[11],
									'Gender' => $data[12],
									'Tenure' => $data[13],
									'AppointedBy' => $data[14]
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

							if

							/**
							 * Victims Section
							 *
							 * Create a new Victim object for the database if
							 * there is victims data.
							 */
							if ($data[])

							/**
							 * Case Section
							 *
							 * Check to see if a new CaseObject needs to
							 * be added to the database based on CaseId
							 */
							if (!$this->CaseObject->exists($case_id)) {

								$case_data = array(
									'CaseId' => $case_num,
									'Name' => $data[5],
									'Number' => $data[6],
									'Summary' => $data[15],
									'Num_Defendants' => $data[7],
									'State' => $data[8],
									'FederalDistrict' => $data[9],
									'JudgeId' => $judge_id,
									'VictimsId' => 
								);

								$this->CaseObject->create();
								$this->CaseObject->save($case_data);
								$case_id = $this->CaseObject->id;
								$this->CaseObject->clear();
							}
							
							for ($col = 0; $col < $num; $col++) {
								echo $data[$col] . "<br />\n";
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