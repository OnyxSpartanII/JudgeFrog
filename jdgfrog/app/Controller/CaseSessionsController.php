<?php

App::uses('AppController', 'Controller');
	
class CaseSessionsController extends AppController {	

	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');

	public function beforeFilter() {
		//inspect user permissions here.
		parent::beforeFilter();
		$this->Auth->allow('createCase', 'createCaseSetup', 'saveSession', 'saveStep', 'index');

	}

	public function beforeRender() {
		parent::beforeRender();
		$params = $this->Session->read('form.params');
				//print_r($params);
		$this->set('params', $params);
	}	

	public function create_case_index(){
		$this->Session->delete('form');
	}

	/**
	*	This method executes before starting the form for inserting an individual case.
	*	The number of steps in the form are dynamically calculated based on the number
	*	of views in the format [create_case_x.ctp] where x is a number.
	*/
	public function createCaseSetup() {
		App::uses('Folder', 'Utility');
		$createViewFolder = new Folder(APP.'View'.DS.'CaseSessions');
		//Subtract 1 for the index page.
		$steps = count($createViewFolder->find('create_case_.*\.ctp')) - 1;
		$this->Session->write('form.params.steps', $steps);
		$this->Session->write('form.params.maxProgress', 0);
		$this->redirect(array('action' => 'create_case', 1));
	}

	/**
	*	This method is the core step handling method. The method is passed the desired
	*	step number and renders the view based on the step number. 
	*
	*/
	public function createCase($currentStep) {

		$maxSessionId = null;
		//If the step specified does not have a view, throw a 404 exception.
		if (!file_exists(APP.'View'.DS.'CaseSessions'.DS.'create_case_'.$currentStep.'.ctp')) {
			throw new NotFoundException();
		}

		$maxAllowed = $this->Session->read('form.params.maxProgress') + 1;

		/*if ($currentStep > $maxAllowed) {
			$this->redirect('/dashboard/create_case/'.$maxAllowed);
		}
		else {
			$this->Session->write('form.params.currentStep', $currentStep);
		}*/

		$this->Session->write('form.params.currentStep', $currentStep);
		print_r('Form data ');
		print_r($this->Session->read('form.params'));
		print_r($this->Session->read('form.data'));
		print_r($maxSessionId);
		//debug($this->request->data, true, true);
		
		//$this->redirect(array('action' => 'createCase', $currentStep+1));
		//print_r($currentStep+1);

		if ($this->request->is('post')) {

			//Refactor this code into validateFormData() later.

			/*	CakePHP magic happens here. Data from each step is appended to 
			* 	the form.data array. If the current defendant # is less than the
			*	total number of defendants, then the form will loop around to step 3
			*	while retaining the information from steps 1 and 2. The input
			*	from steps 3-7 again will overwrite the previous defendant's
			* 	information, even if left blank. The new defendant is then saved
			*	as a new row in the case_sessions table, linked by the session_id.
			*/
			if ($currentStep == 1) {

				//Store case information. Extract case name, number of defendants.

				$this->Session->write('form.params.caseName', $this->request->data['CaseSession']['CaseNam']);
				$this->Session->write('form.params.numDefs', $this->request->data['CaseSession']['NumDef']);
				$this->Session->write('form.params.curDefNum', 1);

				//$sessionId = $this->getSessionId();

				$newSessionId = $this->getSessionId();
				
				$this->Session->write('form.params.sessionId', $newSessionId);
				$this->Session->write('form.data.CaseSession.session_id', $newSessionId);

				$prevSessionData = $this->Session->read('form.data');
				$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				$this->Session->write('form.data', $currentSessionData);
				//set session ID. Maybe place in setup method?
				//set author.
				$this->redirect(array('action' => 'create_case', $currentStep+1));	

			} elseif ($currentStep == 2) {
				//Extract victim and type of trafficking information.
				$prevSessionData = $this->Session->read('form.data');
				$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				$this->Session->write('form.data', $currentSessionData);
				$this->redirect(array('action' => 'create_case', $currentStep+1));					

			} elseif ($currentStep == 3) {
				//Defendant Personal Information
				$prevSessionData = $this->Session->read('form.data');
				$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				$this->Session->write('form.data', $currentSessionData);
				$this->Session->write('form.params.currentDefendantLast', $this->request->data['CaseSession']['DefLast']);
				$this->Session->write('form.params.currentDefendantFirst', $this->request->data['CaseSession']['DefFirst']);
				$this->redirect(array('action' => 'create_case', $currentStep+1));	

			} elseif ($currentStep == 4) {
				//Arrest and Bail Information
				$prevSessionData = $this->Session->read('form.data');
				$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				$this->Session->write('form.data', $currentSessionData);
				$this->redirect(array('action' => 'create_case', $currentStep+1));					

			} elseif ($currentStep == 5) {
				//Charges and Statute Information
				//$prevSessionData = $this->Session->read('form.data');
				//$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				//$this->Session->write('form.data', $currentSessionData);
				$this->redirect(array('action' => 'create_case', $currentStep+1));				

			} elseif ($currentStep == 6) {
				//Sentencing Information
				$prevSessionData = $this->Session->read('form.data');
				$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				$this->Session->write('form.data', $currentSessionData);
				$this->redirect(array('action' => 'create_case', $currentStep+1));					

			} elseif ($currentStep == 7) {
				//Organized Crime Group page
			//	if ($this->validateFormData($this->request->data, $currentStep)) {
					$prevSessionData = $this->Session->read('form.data');
					$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
					$this->Session->write('form.data', $currentSessionData);
					$this->redirect(array('action' => 'create_case', $currentStep+1));						
				//}

			} elseif ($currentStep == 8) {
				$this->CaseSession->set($this->Session->read('form.data'));
				$this->CaseSession->save();

				//Progress to next defendant if the number of defendants >  1 && currentDefendant < number of defendants.
				if ($this->Session->read('form.params.curDefNum') < $this->Session->read('form.params.numDefs')) {
					//$this->CaseSession->clear();				
					$currentStep = 3;
					$this->Session->write('form.params.curDefNum', $this->Session->read('form.params.curDefNum')+1);
					$this->redirect(array('action' => 'create_case', $currentStep));
				}

			}

			//$this->CaseSession->set($this->request->data);
			//print_r($this->request->data);
//			debug($currentStep, true, true);
//			$this->CaseSession->save();
/*			if ($this->CaseSession->validates()) {
//				$prevSessionData = $this->Session->read('form.data');
//				$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);

				if ($currentStep < $this->Session->read('form.params.steps')) {
					//$this->CaseSession->save();
//					$this->Session->write('form.data', $currentSessionData);
					$this->Session->write('form.params.maxProgress', $currentStep);
					$this->redirect(array('action' => 'create_case', $currentStep+1));
				} else 	{
					$this->CaseSession->set('CaseDefId', 3);
					$this->CaseSession->set('complete', true);
					//$this->CaseSession->save();
				}

			} */



			//$this->redirect(array('action' => ''));
		} else {
			//$this->request->data = $this->Session->read('form.data');
		}
				//print_r($currentStep);
		$this->render('create_case_'.$currentStep);

		//print_r($this->params);
	}

	public function getSessionId() {
		$maxSessionId = $this->CaseSession->find('first', array('fields' => array('MAX(CaseSession.session_id) as session_id')));
		$newSessionId = $maxSessionId[0]['session_id'] + 1;
		return $newSessionId;
	}

	public function saveRecord() {

		//$conditions = array('case_sessions.id' => $this->Session->read('form.params.id'));
		//$recordExists = $this->CaseSession->find('all', 'options' => array('conditions' => $conditions));
		
	}

	public function validateFormData() {

	}

}