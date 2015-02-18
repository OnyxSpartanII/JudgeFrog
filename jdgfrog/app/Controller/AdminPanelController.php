<?php

App::uses('AppController', 'Controller');

class AdminPanelController extends AppController {

	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');
	public $name = 'AdminPanel';

	public function beforeFilter() {
		//inspect user permissions here.
		parent::beforeFilter();
		$this->Auth->allow('createCase', 'createCaseSetup', 'saveSession', 'index');

	}

	public function index(){
		$this->render();
	}

	public function panel() {
		$this->set('title', 'Admin Panel | Human Trafficking Data');
		$this->set('selected', 'panel');
	}

	/**
	*	This method executes before starting the form for inserting an individual case.
	*	The number of steps in the form are dynamically calculated based on the number
	*	of views in the format [create_case_x.ctp] where x is a number.
	*/
	public function createCaseSetup() {
		App::uses('Folder', 'Utility');
		$createViewFolder = new Folder(APP.'View'.DS.'AdminPanel');
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

		/*$maxAllowed = $this->Session->read('form.params.maxProgress') + 1;
		if ($currentStep > $maxAllowed) {
			$this->redirect('/AdminPanel/create_case_'.$maxAllowed);
		}
		else {
			$this->Session->write('form.params.currentStep', $currentStep);
		}*/

		$this->render('create_case_'.$currentStep);

	}

	public function saveStep() {
		$this->Session->flash('saved!');
	}

	public function saveSession() {


		if ($this->request->is('post')) {
			pr($this->request->data);
		}

		else {
			//read in previous data?
		}
	}

}