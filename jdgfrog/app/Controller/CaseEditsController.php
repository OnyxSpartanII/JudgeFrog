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

	public function edit() {
		$caseNumber = '2:07-cr-00785-JLL';
		$this->Session->write('form.data.test', 'test');
		$case = $this->getCase($caseNumber);
		// 30 defs: 3:10-cr-00260
		// 4 defs: 2:07-cr-00785-JLL
		$this->set('case', $case);

		if ($this->request->is('post')) {

			$data = $this->request->data;
			debug($data);
			if ($this->DataInProgress->updateAll(array("DataInProgress.CaseNam" => "'test'", 'DataInProgress.NumDef' => 1000), array('DataInProgress.CaseNum' => '2:07-cr-00785-JLL')) ) {
				print_r('Save successful!');
			} else {
				print_r('Something went wrong. Case information not saved.');
			}
			//debug($this->request->data);
			//$this->saveEdits();
		}
		$this->render('edit');		
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
			//debug($this->request->data);
			if ($this->DataInProgress->save($this->request->data)) {
				print_r('Save successful!');
			} else {
				print_r('An error occurred. The defendant was not saved.');
			}
		}

	}

	public function saveEdits() {
		debug($this->request->data);

	}


	/*
	*	Method name: displayCase
	*		This method displays the case object passed to it.
	*
	*
	*/
	public function displayCase($case) {
		$this->set($case);
		$this->render('edit');
	}
}