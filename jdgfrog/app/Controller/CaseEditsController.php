<?php

App::uses('AppController', 'Controller');

class CaseEditsController extends AppController {
	public $helpers = array('Html', 'Session');
	public $components = array('Session', 'Paginator');
	public $name = 'CaseEdits';
	public $uses = array('DataInProgress', 'Datum');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('editDefendant', 'getCase', 'edit', 'saveEdits');
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
												'group' => 'Datum.CaseNam'
												)
										);
		
		$this->set('dataCases', $dataCases);
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
			$this->set('case', $case);
		} else {
			//Redirect to error page?
			print_r('Invalid arguments. Missing defendant name or case number.');
		}

		if ($this->request->is('post')) {

			$this->DataInProgress->clear();
			$this->request->data['DataInProgress']['id'] = $caseId;

			if ($this->DataInProgress->save($this->request->data)) {
				$this->redirect('/admin/cases/edit/'.$caseNumber);
				print_r('Save successful!');
			} else {
				print_r('An error occurred. Changes to defendant were not saved.');
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

		if ($this->request->is('post')) {
			if ($this->DataInProgress->save($this->request->data)) {
				debug($this->request->data);
				$this->redirect('/admin/cases/edit/'.$this->request->data['DataInProgress']['CaseNum']);
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
		//debug($caseNumber);
		$case = $this->DataInProgress->find('first', array(
													'conditions' => array(
																		'DataInProgress.CaseNum' => $caseNumber)
													)
											);
		//debug($case);

		$this->set('case', $case);
		if ($this->request->is('post')) {

			$this->DataInProgress->clear();

			//Pull the case information from the case and place it into the request.
			$this->request->data['DataInProgress']['CaseNam'] 			= $case['DataInProgress']['CaseNam'];
			$this->request->data['DataInProgress']['CaseNum'] 			= $case['DataInProgress']['CaseNum'];
			$this->request->data['DataInProgress']['NumDef'] 			= $case['DataInProgress']['NumDef'] + 1;	//Increment the number of defendants.
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

			$id = $this->getRowId();
			$id = $id + 1;
			$this->request->data['DataInProgress']['id'] = $id;
			//debug($this->request->data);

			if ($this->DataInProgress->save($this->request->data)) {
				$this->redirect('/admin/cases/edit/'.$caseNumber);
				print_r('Defendant added to case!');
				//$this->deleteEmptyCases();

			} else {
				print_r('An error occurred while adding defendant to case.');
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

	public function migrateFromDataToDataInProgress($caseNumber) {

		$data = $this->Datum->find('all', array('conditions' => array('Datum.CaseNum' => $caseNumber)));
		$this->Datum->deleteAll(array('Datum.CaseNum' => $caseNumber, false));
		$this->DataInProgress->clear();

		foreach ($data as &$d) {
			$d['DataInProgress'] = $d['Datum'];
			unset($d['Datum']);
		}		

		$this->DataInProgress->saveMany($data);
		$this->redirect('/admin/cases/edit/'.$caseNumber);
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
	*		the edit case page.
	*/

	public function deleteEmptyCases() {
		$this->DataInProgress->deleteAll(array('DefFirst' => '', 'DefLast' => ''));
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

	public function delete_case($CaseNum) {
		$this->Datum->deleteAll(array('Datum.CaseNum' => $CaseNum), false);
		$this->Session->setFlash('Case Successfully Deleted!');
		$this->redirect(array('controller' => 'AdminPanel', 'action' => 'edit'));

	}	
	public function delete_def($defArray) {
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
			$this->DataInProgress->deleteAll(array('DataInProgress.DefFirst' => $defFirst, 'DataInProgress.DefLast' => $defLast), false);
			$this->Session->setFlash('Defendant Successfully Deleted!');
			$this->redirect(array('controller' => '/admin/cases', 'action' => 'edit/'.$caseNumber));
		} else {
			//Redirect to error page?
			$this->Session->setFlash('Invalid arguments. Missing defendant name or case number.');
		}

	}

}

?>