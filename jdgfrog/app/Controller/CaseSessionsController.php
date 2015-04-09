<?php

App::uses('AppController', 'Controller');
	
class CaseSessionsController extends AppController {	

	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session', 'Paginator');
	public $name = 'CaseSessions';
	public $uses = array('DataInProgress', 'CaseSession');

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
		$this->Session->write('form.params.stepProgress', 0);
		$this->CaseSession->create();
		$this->redirect('/admin/cases/create_case/1');
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

		$maxAllowed = $this->Session->read('form.params.stepProgress') + 1;

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

		if ($this->request->is('post')) {

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
				$this->Session->write('form.params.caseNum', $this->request->data['CaseSession']['CaseNum']);
				$this->Session->write('form.params.numDefs', $this->request->data['CaseSession']['NumDef']);
				$this->Session->write('form.params.curDefNum', 1);

				//Get the current session's ID based on what's currently in the database.
				$newSessionId = $this->getSessionId();
				$newRowId = $this->getRowId();
				$newRowId = $newRowId + 1;
				$currentUser = $this->Auth->user('id');
				
				$this->Session->write('form.data.CaseSession.author', $currentUser);
				$this->Session->write('form.params.sessionId', $newSessionId);
				$this->Session->write('form.data.CaseSession.session_id', $newSessionId);
				$this->Session->write('form.params.id', $newRowId);

				$this->request->data['CaseSession']['author'] = $currentUser;
				$this->request->data['CaseSession']['session_id'] = $newSessionId;
				$this->request->data['CaseSession']['id'] = $newRowId;

				$prevSessionData = $this->Session->read('form.data');
				$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				$this->Session->write('form.data', $currentSessionData);
				if ($this->CaseSession->save($this->request->data)) {
					$currentStep++;
					$this->redirect('/admin/cases/create_case/'.$currentStep);
				} else {
					debug($this->CaseSession->validationErrors);
				}

			} elseif ($currentStep == 2) {
				//Extract victim and type of trafficking information.
				$prevSessionData = $this->Session->read('form.data');
				$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				$this->Session->write('form.data', $currentSessionData);
				$this->request->data['CaseSession']['id'] = $this->Session->read('form.params.id');
				if ($this->CaseSession->save($this->request->data, true, array('AdultSexTraf', 'MinorSexTraf', 'LaborTraf', 'NumVic', 'NumVicMinor', 'NumVicFemale', 'NumVicForeign'))) {
					$currentStep++;
					$this->redirect('/admin/cases/create_case/'.$currentStep);	
				} else {
					debug($this->CaseSession->validationErrors);
				}

			} elseif ($currentStep == 3) {
				//Defendant Personal Information
				//$prevSessionData = $this->Session->read('form.data');
				//$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				//$this->Session->write('form.data', $currentSessionData);
				$this->Session->write('form.params.currentDefendantLast', $this->request->data['CaseSession']['DefLast']);
				$this->Session->write('form.params.currentDefendantFirst', $this->request->data['CaseSession']['DefFirst']);

				$this->CaseSession->set($this->Session->read('form.data'));

				$this->request->data['CaseSession']['id'] = $this->Session->read('form.params.id');
				if ($this->CaseSession->save($this->request->data, true, array('DefFirst','DefLast','DefRace','DefGender','DefArrestAge','DefBirthdate','Alias'))) {
					$currentStep++;
					$this->redirect('/admin/cases/create_case/'.$currentStep);	
				} else {
					debug($this->CaseSession->validationErrors);
				}
				//$this->redirect(array('action' => 'create_case', $currentStep+1));	

			} elseif ($currentStep == 4) {
				//Arrest and Bail Information
				//$prevSessionData = $this->Session->read('form.data');
				//$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				//$this->Session->write('form.data', $currentSessionData);
				//$this->redirect(array('action' => 'create_case', $currentStep+1));					
				$this->request->data['CaseSession']['id'] = $this->Session->read('form.params.id');
				if ($this->CaseSession->save($this->request->data, true, array('ChargeDate','ArrestDate','Detained','BailType','BailAmount','FelCharged','FelSentenced'))) {
					$currentStep++;
					$this->redirect('/admin/cases/create_case/'.$currentStep);
				} else {
					debug($this->CaseSession->validationErrors);
				}

			} elseif ($currentStep == 5) {
				//Charges and Statute Information
				//$prevSessionData = $this->Session->read('form.data');
				//$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				//$this->Session->write('form.data', $currentSessionData);
				//$this->redirect(array('action' => 'create_case', $currentStep+1));	
				$this->request->data['CaseSession']['id'] = $this->Session->read('form.params.id');

				$statutes = ['1961to1968', '1028', '1351',
								'1425', '1512', '1546', '1581to1588', '1589',
								'1590', '1591', '1592', '2252', '2260', '2421to2424',
								'1324', '1328'];
				$fields = ['Counts', 'CountsNP', 'PleaDismissed', 'PleaGuilty',
							'TrialGuilty', 'TrialNG', 'Fines', 'Sent', 'Prob'];

				$fieldList = array();

				foreach ($statutes as $statute) {
					foreach ($fields as $field) {
						array_push($fieldList, "$field" . "$statute");
					}	
				}

				if ($this->CaseSession->save($this->request->data, true, $fieldList)) {
					$currentStep++;
					$this->redirect('/admin/cases/create_case/'.$currentStep);
				} else {
					debug($this->CaseSession->validationErrors);
				}		

			} elseif ($currentStep == 6) {
				//Sentencing Information
				//$prevSessionData = $this->Session->read('form.data');
				//$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
				//$this->Session->write('form.data', $currentSessionData);
				//$this->redirect(array('action' => 'create_case', $currentStep+1));	
				$this->request->data['CaseSession']['id'] = $this->Session->read('form.params.id');
				if ($this->CaseSession->save($this->request->data, true, array('DateTerm','SentDate','TotalSentence','Restitution','AssetForfeit','Appeal','SupRelease','Probation'))) {
					$currentStep++;
					$this->redirect('/admin/cases/create_case/'.$currentStep);
				} else {
					debug($this->CaseSession->validationErrors);
				}				

			} elseif ($currentStep == 7) {
				//Organized Crime Group page
			//	if ($this->validateFormData($this->request->data, $currentStep)) {
					//$prevSessionData = $this->Session->read('form.data');
					//$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);
					//$this->Session->write('form.data', $currentSessionData);
					//$this->redirect(array('action' => 'create_case', $currentStep+1));						
				//}
				$this->request->data['CaseSession']['id'] = $this->Session->read('form.params.id');
				if ($this->CaseSession->save($this->request->data, true, array('OCName1','OCType1','OCRace1','OCScope1','OCName2','OCType2','OCRace2','OCScope2'))) {

					if ($this->Session->read('form.params.curDefNum') < $this->Session->read('form.params.numDefs')) {
						$this->set('caseComplete', false);
					} else {
						$this->set('caseComplete', true);
					}
					$currentStep++;
					$this->redirect('/admin/cases/create_case/'.$currentStep);
				} else {
					debug($this->CaseSession->validationErrors);
				}

			} elseif ($currentStep == 8) {

				//$this->CaseSession->set($this->Session->read('form.data'));
				//$this->CaseSession->save();

				//Progress to next defendant if the number of defendants >  1 && currentDefendant < number of defendants.
				if ($this->Session->read('form.params.curDefNum') < $this->Session->read('form.params.numDefs')) {
					$currentStep++;
					$this->CaseSession->clear();
					$currentStep = 3;
					$this->Session->write('form.params.curDefNum', $this->Session->read('form.params.curDefNum')+1);
					$this->Session->write('form.params.id', $this->Session->read('form.params.id')+1);

					$this->CaseSession->set('session_id', $this->Session->read('form.params.sessionId'));
					$this->CaseSession->set('id', $this->Session->read('form.params.id'));
					$this->CaseSession->set('CaseNum', $this->Session->read('form.params.caseNum'));
					if ($this->CaseSession->save()) {
						$this->redirect('/admin/cases/create_case/'.$currentStep);
					} else {
					debug($this->CaseSession->validationErrors);
					}

				} else {
					//move case to DataInProgress table

					$data = $this->CaseSession->find('all', array('conditions' => array('CaseSession.session_id' => $this->Session->read('form.params.sessionId'))));
					//debug($data);
					$index = 0;
					$modifiedData = array();
					//debug($data);
					//$this->CaseSession->deleteAll(array('CaseSession.session_id' => $this->Session->read('form.params.sessionId', false)));
					foreach ($data as &$d) {
						unset($d['CaseSession']['session_id']);
						unset($d['CaseSession']['current_step']);
						unset($d['CaseSession']['complete']);
						$d['DataInProgress'] = $d['CaseSession'];
						unset($d['CaseSession']);
					}


					debug($data);
					$this->DataInProgress->clear();
					$this->DataInProgress->saveMany($data, array('validate' => false));
					//$this->redirect(array('controller' => 'CaseReviews', 'action' => 'review'));
				}

			}

		}

		$this->render('create_case_'.$currentStep);
	}

	/*
	*	Method: displayCasesInProgress
	*	-------------------
	*	This method retrives all cases currently in progress in the CaseSessions table and displays
		them on the associated view (resume.ctp).
	*/

	public function displayCasesInProgress() {
		$paginate = array('limit' => 25, 
						'order' => array('CaseSession.id' => 'asc'), 
						'fields' => array(
										'CaseSession.id', 'CaseSession.author', 
										'CaseSession.modified', 'CaseSession.created', 
										'CaseSession.caseNam', 'CaseSession.caseNum', 
										'CaseSession.current_step')
						);
		$this->Paginator->settings = $this->paginate;

		$data = $this->Paginator->paginate('CaseSession');
		$this->set('data', $data);
		$this->render('resume');
	}

	public function resumeCase() {
		$this->Session->write('form.params.resume', true);
	}

	/*
	*	Method: getSessionId
	*	-------------------
	*	This method retrieves the max 'session_id' in the CaseSessions table and adds 1.
	*/

	public function getSessionId() {
		$maxSessionId = $this->CaseSession->find('first', array('fields' => array('MAX(CaseSession.session_id) as session_id')));
		$newSessionId = $maxSessionId[0]['session_id'] + 1;
		return $newSessionId;
	}

	/*
	*	Method: getRowId
	*	-------------------
	*	This method retrieves the max 'id' in the CaseSessions table and adds 1. This new ID is 
	*	to be the ID of a new row in the CaseSessions table.
	*/

	public function getRowId() {
		$newRowId = $this->DataInProgress->find('first', array('fields' => array('MAX(DataInProgress.id) as id')));
		$newRowId = $newRowId[0]['id'];
		return $newRowId;
	}

	public function saveRecord() {

		//$conditions = array('case_sessions.id' => $this->Session->read('form.params.id'));
		//$recordExists = $this->CaseSession->find('all', 'options' => array('conditions' => $conditions));
		
	}

	public function validateFormData() {

	}

	public function delete_session($CaseNum) {
		$this->CaseSession->deleteAll(array('CaseSession.caseNum' => $CaseNum), false);
		$this->Session->setFlash('Case Successfully Deleted!');
		$this->redirect(array('controller' => 'CaseSessions', 'action' => 'create_case_index'));

	}

}