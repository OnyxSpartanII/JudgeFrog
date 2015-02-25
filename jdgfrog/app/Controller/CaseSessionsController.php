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
		$steps = count($createViewFolder->find('create_case_.*\.ctp'));
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

		//If the step specified does not have a view, throw a 404 exception.
		if (!file_exists(APP.'View'.DS.'AdminPanel'.DS.'create_case_'.$currentStep.'.ctp')) {
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
		$this->Session->write('form.params.steps', 10);
		print_r($this->Session->read('form.params'));
		
		//$this->redirect(array('action' => 'createCase', $currentStep+1));
		//print_r($currentStep+1);

		if ($this->request->is('post')) {

//			$this->CaseSession->set($this->request->data);
			debug($this->request->data, true, true);
//			debug($currentStep, true, true);
//			$this->redirect(array('action' => 'createCase', $currentStep+1));
			if ($this->CaseSession->validates()) {
				$prevSessionData = $this->Session->read('form.data');
				$currentSessionData = Hash::merge( (array) $prevSessionData, $this->request->data);

/*					if ($currentStep < $this->Session->read('form.params.steps')) {
					$this->Session->write('form.data', $currentSessionData);
					$this->Session->write('form.params.maxProgress', $currentStep);
					$this->redirect(array('action' => 'createCase', $currentStep+1));


				} 
				else 	{
					//$this->CaseSession->save();
				}
*/
			}
		}
		else {
			$this->request->data = $this->Session->read('form.data');
		}
		//print_r($currentStep);
		$this->render('create_case_'.$currentStep);

		//print_r($this->params);
	}

}