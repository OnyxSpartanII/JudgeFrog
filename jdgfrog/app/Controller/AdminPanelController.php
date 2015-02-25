<?php

App::uses('AppController', 'Controller');

class AdminPanelController extends AppController {

	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');
	public $name = 'AdminPanel';

	//var $maxAllowed = 0;
	//var $currentStep;

	public function beforeFilter() {
		//inspect user permissions here.
		parent::beforeFilter();
		$this->Auth->allow('createCase', 'createCaseSetup', 'saveSession', 'saveStep', 'index');

	}


	public function index(){
		$this->render();
	}

	public function panel() {
		$this->set('title', 'Admin Panel | Human Trafficking Data');
		$this->set('selected', 'panel');
	}

}