<?php

App::uses('AppController', 'Controller');

class CaseEditController extends AppController {
	public $helpers = array('Html', 'Session');
	public $components = array('Session', 'Paginator');
	public $name = 'CaseEdit';
	public $uses = array('DataInProgress');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
	}

	public function index() {
		$case = $this->getCase('2:07-cr-00785-JLL');
		debug($case);
		//$this->displayCase($case);
	}

	/*
	*	Method name: getCase
	*		This method retrieves the case with the passed ID. It appends the case into one array with each defendant
	*		as an entry into the array. Case[Defendant], where sizeof(Defendant) is the number of defendants in that case.
	*		The method then returns the case.
	*
	*/
	public function getCase($caseId) {
		$case = $this->DataInProgress->find('all', array('conditions' => array('DataInProgress.CaseNum' => $caseId)));
		return $case;
	}

	/*
	*	Method name: displayCase
	*		This method displays the case object passed to it.
	*
	*
	*/
	public function displayCase($case) {
		$this->render('edit');
	}

	public function saveEdits() {

	}
}