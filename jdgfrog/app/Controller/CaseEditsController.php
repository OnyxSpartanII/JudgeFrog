<?php

App::uses('AppController', 'Controller');

class CaseEditsController extends AppController {
	public $helpers = array('Html', 'Session');
	public $components = array('Session', 'Paginator');
	public $name = 'CaseEdits';
	public $uses = array('DataInProgress', 'Datum');

	public function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allow();
	}

	/*
	*	This method performs authorization checks on methods in this controller.
	*	If the method accessed is not below, isAuthorized () will check the method
	*	isAuthorized() in AppController, where admin permissions are allowed.
	*/

	public function isAuthorized($user) {

		if ($this->action === 'index') {
			return true;
		}
		if ($this->action === 'editDefendant' || $this->action === 'edit') {
			return true;
		}
		if ($this->action === 'addCase' || $this->action === 'addDefendant') {
			return true;
		}
		if ($this->action === 'delete_incomplete_case' || $this->action === 'delete_def') {
			return true;
		}

		return parent::isAuthorized($user);
	}

	public function index() {

		$this->set('title', 'Case Edit - Admin Panel | Human Trafficking Data');
		$this->layout = 'admin_panel_layout';
		$this->set('active', 'edit');
		
		$dataCases = $this->Datum->find('all', array(
											'fields' => array(
															'Datum.CaseNum', 
															'Datum.CaseNam', 
															'Datum.JudgeName', 
															'Datum.State', 
															'Datum.author', 
															'Datum.NumDef', 
															'Datum.modified'),
											'group' => 'Datum.CaseNum'
											)
										);
		$dipCases = $this->DataInProgress->find('all', array(
												'fields' => array(
																'DataInProgress.CaseNum', 
																'DataInProgress.CaseNam', 
																'DataInProgress.JudgeName', 
																'DataInProgress.State', 
																'DataInProgress.author', 
																'DataInProgress.NumDef', 
																'DataInProgress.modified'),
												'group' => 'DataInProgress.CaseNum'
												)
										);
		
		if($this->Auth->user('role') === 'admin') {
			$this->set('admin', true);
		} else {
			$this->set('admin', false);
		}
		
		$this->set('dataCases', $dataCases);
		$this->set('dipCases', $dipCases);
	}

	public function edit($num) {

		$this->autoRender = false;
		$caseNumber = urldecode($num);
		//$caseNumber = '1:13-cr-00069-LO';
		$case = $this->getCase($caseNumber);
		if ($case) {
			$this->set('case', $case);	
		} else {
			$this->set('caseNotFoundError', true);
			// print_r('Case not found.');
			$this->Session->setFlash('Case deleted because there were no defendants...');
			$this->redirect('/admin/cases/edit/index');
		}

		// 30 defs: 3:10-cr-00260
		// 4 defs: 2:07-cr-00785-JLL
		
		if ($this->request->is('post')) {


			$this->DataInProgress->set($this->request->data);
			$valFields =  ['CaseNam', 'CaseNum', 'JudgeName', 'JudgeGen', 'JudgeRace', 'JudgeTenure', 'JudgeApptBy',
						'FedDistrictLoc', 'FedDistrictNum', 'State', 'CaseSummary', 'LaborTraf', 'AdultSexTraf', 
						'MinorSexTraf', 'NumVic', 'NumVicMinor', 'NumVicForeign', 'NumVicMinor', 'NumVicFemale'];

			if ($this->DataInProgress->validates(array('fieldList' => $valFields))) {

				$data = $this->request->data;
	
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
				$submit			= $data['DataInProgress']['SubmittedForReview'];
				
				$userFN = $this->Auth->user('first_name');
				$userLN = $this->Auth->user('last_name');
				$insertUser = $this->request->data['DataInProgress']['author'] = $userFN . ' ' . $userLN;		
	
				$caseName = addslashes($caseName);
				$judgeName = addslashes($judgeName);
				$caseSummary = addslashes($caseSummary);
				$author = addslashes($insertUser);
			
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
								'DataInProgress.author' 		=> "'$author'",
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
								'DataInProgress.NumVicFemale' 	=> "'$numVicFemale'",
								'DataInProgress.SubmittedForReview' => "'$submit'"
				);
	
				if ($this->DataInProgress->updateAll($fields, array('DataInProgress.CaseNum' => $caseNumber)) ) {
					$this->redirect('/admin/cases/edit/index');
					print_r('Something went right.');
					
				} else {
					print_r('Something went wrong. Case information not saved.');
					debug($this->DataInProgress->validationErrors);
				}
				
			} else {
				print_r('Error occurred while adding case.');
				$errors = $this->DataInProgress->validationErrors;
				debug($errors);						
			}

		} else {
			$this->render('edit');
		}
	
	}

	/*
	*	Method name: editDefendant
	*		This method takes a defendant name and case # passed to it and renders
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

			//Check for "null" value from YEAR type in database table.
			//It's only 0000 if it's null.
			if ('0000' == $case['DataInProgress']['DefBirthdate']) {
				$case['DataInProgress']['DefBirthdate'] = '';
			}

			$this->set('case', $case);
		} else {
			//Redirect to error page?
			print_r('Invalid arguments. Missing defendant name or case number.');
		}

		if ($this->request->is('post')) {

			$this->DataInProgress->clear();
			$this->request->data['DataInProgress']['id'] = $caseId;

			if ('0000' == $this->request->data['DataInProgress']['DefBirthdate']) {
				$this->request->data['DataInProgress']['DefBirthdate'] = '';
			}

			$userFN = $this->Auth->user('first_name');
			$userLN = $this->Auth->user('last_name');
			$insertUser = $this->request->data['DataInProgress']['author'] = $userFN . ' ' . $userLN;			

			if ($this->DataInProgress->save($this->request->data)) {
				$this->redirect('/admin/cases/edit/'.$caseNumber);
				print_r('Save successful!');
			} else {
				print_r('An error occurred. Changes to defendant were not saved.');
				debug($this->DataInProgress->validationErrors);
			}
		}

	}

	/*
	*
	*	Method name: addCase
	*
	*	This method allows a new case to be created. The method uses a modified version of the
	*	edit.ctp view (called add_case.ctp), but otherwise functions similarly. It also will use
	*	the same edit_defendant.ctp and add_defendant.ctp views as edit().
	*/

	public function addCase() {
		
		$userFN = $this->Auth->user('first_name');
		$userLN = $this->Auth->user('last_name');
		$insertUser = $this->request->data['DataInProgress']['author'] = $userFN . ' ' . $userLN;
		$fields = array();
				
		if ($this->request->is('post')) {

			$this->DataInProgress->set($this->request->data);
			$fields =  ['CaseNam', 'CaseNum', 'JudgeName', 'JudgeGen', 'JudgeRace', 'JudgeTenure', 'JudgeApptBy',
						'FedDistrictLoc', 'FedDistrictNum', 'State', 'CaseSummary', 'LaborTraf', 'AdultSexTraf', 
						'MinorSexTraf', 'NumVic', 'NumVicMinor', 'NumVicForeign', 'NumVicMinor', 'NumVicFemale'];

			if ($this->DataInProgress->validates(array('fieldList' => $fields))) {

				if ($this->DataInProgress->save($this->request->data, array('validate' => false))) {
					$this->redirect('/admin/cases/edit/'.$this->request->data['DataInProgress']['CaseNum']);
					debug($this->request->data);
					$this->Session->setFlash('Case Created!');
				} else {
					print_r('Error occurred while adding case.');
					$errors = $this->DataInProgress->validationErrors;
					debug($errors);
				}
			} else {
				print_r('Error occurred while adding case.');
				$errors = $this->DataInProgress->validationErrors;
				debug($errors);				
			}
		}

		$this->render('add_case');
	}

	/*
	*
	*	Method name: addDefendant
	*
	*	This method allows a defendant to be added to an existing case.
	*	The case information (name, number, judge, etc.) is taken from
	*	the case number passed to the function. The new defendant
	*	information is collected from a POST, has the necessary case
	*	data added to the request, and the new defendant is then saved
	*	to the DataInProgress table. The method then redirects to the 
	*	case edit page for the given case.
	*/

	public function addDefendant($caseNumber) {

		$case = $this->DataInProgress->find('first', array(
													'conditions' => array(
																		'DataInProgress.CaseNum' => $caseNumber)
													)
											);
		$this->set('case', $case);

		if ($this->request->is('post')) {

			$this->DataInProgress->clear();

			//Pull the case information from the case and place it into the request.
			$this->request->data['DataInProgress']['CaseNam'] 			= $case['DataInProgress']['CaseNam'];
			$this->request->data['DataInProgress']['CaseNum'] 			= $case['DataInProgress']['CaseNum'];
			$this->request->data['DataInProgress']['NumDef'] 			= $case['DataInProgress']['NumDef'];
			$this->request->data['DataInProgress']['JudgeName'] 		= $case['DataInProgress']['JudgeName'];
			$this->request->data['DataInProgress']['JudgeRace'] 		= $case['DataInProgress']['JudgeRace'];
			$this->request->data['DataInProgress']['JudgeGen'] 			= $case['DataInProgress']['JudgeGen'];
			$this->request->data['DataInProgress']['JudgeTenure'] 		= $case['DataInProgress']['JudgeTenure'];
			$this->request->data['DataInProgress']['JudgeApptBy'] 		= $case['DataInProgress']['JudgeApptBy'];
			$this->request->data['DataInProgress']['FedDistrictNum'] 	= $case['DataInProgress']['FedDistrictNum'];
			$this->request->data['DataInProgress']['FedDistrictLoc']	= $case['DataInProgress']['FedDistrictLoc'];
			$this->request->data['DataInProgress']['State'] 			= $case['DataInProgress']['State'];
			$this->request->data['DataInProgress']['CaseSummary']		= $case['DataInProgress']['CaseSummary'];
			$this->request->data['DataInProgress']['LaborTraf']			= $case['DataInProgress']['LaborTraf'];
			$this->request->data['DataInProgress']['AdultSexTraf']		= $case['DataInProgress']['AdultSexTraf'];
			$this->request->data['DataInProgress']['MinorSexTraf']		= $case['DataInProgress']['MinorSexTraf'];
			$this->request->data['DataInProgress']['NumVic']			= $case['DataInProgress']['NumVic'];
			$this->request->data['DataInProgress']['NumVicMinor']		= $case['DataInProgress']['NumVicMinor'];
			$this->request->data['DataInProgress']['NumVicForeign']		= $case['DataInProgress']['NumVicForeign'];
			$this->request->data['DataInProgress']['NumVicFemale']		= $case['DataInProgress']['NumVicFemale'];
			
			/********************
			* Obtain the next globally available id
			*********************/
			$id = $this->getRowId();
			$id = $id + 1;
			$this->request->data['DataInProgress']['id'] = $id;

			/********************
			*	Increment the number of defendants.
			*********************/
			$temp = $this->request->data['DataInProgress']['NumDef'];
			$temp = $temp + 1;
			$this->request->data['DataInProgress']['NumDef'] = $temp;

			/********************
			*	Set the current user as the most recent editor.
			*********************/
			$userFN = $this->Auth->user('first_name');
			$userLN = $this->Auth->user('last_name');
			$insertUser = $this->request->data['DataInProgress']['author'] = $userFN . ' ' . $userLN;			

			$tempArr = array('DataInProgress.NumDef' => "'$temp'");
			$this->DataInProgress->clear();

			/********************
			*	Filter booleans returned from the database. In CakePHP, they come
			*	out as 'true' or 'false' instead of 0 or 1. We need them as 0 or 1.
			*********************/
			if (false === $this->request->data['DataInProgress']['LaborTraf']) {
				$this->request->data['DataInProgress']['LaborTraf'] = '0';
				print_r('help');
			}

			if (false === $this->request->data['DataInProgress']['AdultSexTraf']) {
				$this->request->data['DataInProgress']['AdultSexTraf'] = '0';
			}

			if (false === $this->request->data['DataInProgress']['MinorSexTraf']) {
				$this->request->data['DataInProgress']['MinorSexTraf'] = '0';
			}

			if (true === $this->request->data['DataInProgress']['LaborTraf']) {
				$this->request->data['DataInProgress']['LaborTraf'] = '1';
				print_r('help');
			}

			if (true === $this->request->data['DataInProgress']['AdultSexTraf']) {
				$this->request->data['DataInProgress']['AdultSexTraf'] = '1';
			}

			if (true === $this->request->data['DataInProgress']['MinorSexTraf']) {
				$this->request->data['DataInProgress']['MinorSexTraf'] = '1';
			}

			/********************
			*	Attempt to save the data in the POST request.
			*	If it succeeds, update the number of defendants
			*	for all rows in the case.
			*********************/
			if ($this->DataInProgress->save($this->request->data)) {
				//update number of defendants
				$this->DataInProgress->updateAll($tempArr, array('DataInProgress.CaseNum' => $case['DataInProgress']['CaseNum']));
				$this->deleteEmptyCases($case['DataInProgress']['CaseNum']);
				$this->redirect('/admin/cases/edit/'.$caseNumber);
				print_r('Defendant added to case!');

			} else {
				print_r('An error occurred while adding defendant to case. Defendant not added.');
				$errors = $this->DataInProgress->validationErrors;
				debug($errors);
			}

		}

		$this->render('add_defendant');

	}

	/*
	*	Method namme: migrateFromDataToDataInProgress
	*		This method moves an entire case from the Data table tot he
	*		DataInProgress table. This method is normally called when a
	*		case from Data (the "live" table, so to speak;  all public 
	*		searches are performed on the Data table) is selected to be
	* 		edited from the edit function in the admin control panel.
	* 		This method is necessary due to the edit functions only working on
	*		cases found in the DataInProgress table.
	*/

	public function migrateFromDataToDataInProgress($num) {

		$caseNumber = urldecode($num);
		$data = $this->Datum->find('all', array('conditions' => array('Datum.CaseNum' => $caseNumber)));
		$this->DataInProgress->clear();

		foreach ($data as &$d) {
			$d['DataInProgress'] = $d['Datum'];
			unset($d['Datum']);

			//filters to compensate for CakePHP pulling booleans out as
			//true or false instead of 0 or 1.
			if ($d['DataInProgress']['JudgeGen'] === false) {
				$d['DataInProgress']['JudgeGen'] = '0';
			}
			if ($d['DataInProgress']['JudgeGen'] === true) {
				$d['DataInProgress']['JudgeGen'] = '1';
			}
			if ($d['DataInProgress']['JudgeApptBy'] === false) {
				$d['DataInProgress']['JudgeApptBy'] = '0';
			}
			if ($d['DataInProgress']['JudgeApptBy'] === true) {
				$d['DataInProgress']['JudgeApptBy'] = '1';
			}
			if ($d['DataInProgress']['Detained'] === false) {
				$d['DataInProgress']['Detained'] = '0';
			}
			if ($d['DataInProgress']['Detained'] === true) {
				$d['DataInProgress']['Detained'] = '1';
			}
			if ($d['DataInProgress']['LaborTraf'] === false) {
				$d['DataInProgress']['LaborTraf'] = '0';
			}
			if ($d['DataInProgress']['LaborTraf'] === true) {
				$d['DataInProgress']['LaborTraf'] = '1';
			}
			if ($d['DataInProgress']['AdultSexTraf'] === false) {
				$d['DataInProgress']['AdultSexTraf'] ='0';
			}
			if ($d['DataInProgress']['AdultSexTraf'] === true) {
				$d['DataInProgress']['AdultSexTraf'] = '1';
			}
			if ($d['DataInProgress']['MinorSexTraf'] === false) {
				$d['DataInProgress']['MinorSexTraf'] = '0';
			}
			if ($d['DataInProgress']['MinorSexTraf'] === true) {
				$d['DataInProgress']['MinorSexTraf'] = '1';
			}
			if ($d['DataInProgress']['AssetForfeit'] === false) {
				$d['DataInProgress']['AssetForfeit'] = '0';
			}
			if ($d['DataInProgress']['AssetForfeit'] === true) {
				$d['DataInProgress']['AssetForfeit'] = '1';
			}
			if ($d['DataInProgress']['SubmittedForReview'] === null) {
				$d['DataInProgress']['SubmittedForReview'] = '0';
			}

			//filters to compensate for years coming out as 0000 when 
			//they're null.
			if ($d['DataInProgress']['DefBirthdate'] === '0000') {
				$d['DataInProgress']['DefBirthdate'] = '';
			}
			if ($d['DataInProgress']['ArrestDate'] === '0000-00-00') {
				$d['DataInProgress']['ArrestDate'] = '';
			}
			if ($d['DataInProgress']['ChargeDate'] === '0000-00-00') {
				$d['DataInProgress']['ChargeDate'] = '';
			}
			if ($d['DataInProgress']['DateTerm'] === '0000-00-00') {
				$d['DataInProgress']['DateTerm'] = '';
			}
			if ($d['DataInProgress']['SentDate'] === '0000-00-00') {
				$d['DataInProgress']['SentDate'] = '';
			}
			if ($d['DataInProgress']['OCType1'] === '0' || $d['DataInProgress']['OCType1'] === null) {
				$d['DataInProgress']['OCType1'] = '';
			}
			if ($d['DataInProgress']['OCType2'] === '0' || $d['DataInProgress']['OCType2'] === null) {
				$d['DataInProgress']['OCType2'] = '';
			}
			if ($d['DataInProgress']['OCScope1'] === '0' || $d['DataInProgress']['OCScope1'] === null) {
				$d['DataInProgress']['OCScope1'] = '';
			}
			if ($d['DataInProgress']['OCScope2'] === '0' || $d['DataInProgress']['OCScope2'] === null) {
				$d['DataInProgress']['OCScope2'] = '';
			}
		}		

		if ($this->DataInProgress->saveMany($data)) {
			$this->Datum->deleteAll(array('Datum.CaseNum' => $caseNumber, false));
			$this->redirect('/admin/cases/edit/'.$caseNumber);
		} else {
			print_r('an error occurred while migrating.');
			debug($this->DataInProgress->validationErrors);
			debug($data);
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
	*	Method name: getRowId()
	*		This method retrieves the current max ID in all database tables.
	*/

	public function getRowId() {
		$newRowId = $this->DataInProgress->find('first', array('fields' => array('MAX(DataInProgress.id) as id')));
		$newRowId = $newRowId[0]['id'];
		return $newRowId;
	}

	/*
	*	Method name: deleteEmptyCases()
	*		This method deletes all rows without a defendant name from the DataInProgress table.
	*		This is intended to be called after the creation of a new case in the transition to
	*		the edit case page. The method requires a caseNum to delete the extra null case row
	*		but leave other cases which have been started but have no defendants yet.
	*
	*		This is due to the way I had to store cases which have been started but have not had
	*		any defendants entered yet.
	*/

	public function deleteEmptyCases($caseNum) {
		$this->DataInProgress->deleteAll(array('DefFirst' => '', 'DefLast' => '', 'CaseNum' => $caseNum));
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

	public function delete_case($num) {
		$this->autoRender = false;
		$caseNum = urldecode($num);
		$this->Datum->deleteAll(array('Datum.CaseNum' => $caseNum), false);
		$this->Session->setFlash('Case Successfully Deleted!');
		$this->redirect('/admin/cases/edit/index');
	}	
	public function delete_incomplete_case($num) {
		$this->autoRender = false;
		$caseNum = urldecode($num);
		$this->DataInProgress->deleteAll(array('DataInProgress.CaseNum' => $caseNum), false);
		$this->Session->setFlash('Case Successfully Deleted!');
		$this->redirect('/admin/cases/edit/index');
	}	
	public function delete_def($defArray) {
		$this->autoRender = false;
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
			$temp = $case['DataInProgress']['NumDef'];
			$temp = $temp - 1;
			$tempArr = array('DataInProgress.NumDef' => "'$temp'");	

			//Decrement number of defendants when a defendant is deleted.		
			$this->DataInProgress->updateAll($tempArr, array('DataInProgress.CaseNum' => $case['DataInProgress']['CaseNum']));
			$this->DataInProgress->deleteAll(array('DataInProgress.DefFirst' => $defFirst, 'DataInProgress.DefLast' => $defLast), false);
			$this->Session->setFlash('Defendant Successfully Deleted!');
			$this->redirect(array('controller' => '/admin/cases', 'action' => 'edit/'.$caseNumber));
		} else {}

	}

}

?>