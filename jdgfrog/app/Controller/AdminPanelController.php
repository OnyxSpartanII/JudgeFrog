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
		$this->set('title', 'Home - Admin Panel | Human Trafficking Data');
    	$this->layout = 'admin_panel_layout';
	}

	public function create_case(){
		$this->set('title', 'Create - Admin Panel | Human Trafficking Data');
    	$this->layout = 'admin_panel_layout';
	}

	public function edit(){
		$this->set('title', 'Edit - Admin Panel | Human Trafficking Data');
    	$this->layout = 'admin_panel_layout';
	}

	public function review(){
		$this->set('title', 'Review - Admin Panel | Human Trafficking Data');
    	$this->layout = 'admin_panel_layout';
	}

	public function manageusers(){
		$this->set('title', 'Manage Users - Admin Panel | Human Trafficking Data');
    	$this->layout = 'admin_panel_layout';
	}
	
	public function panel() {
		$this->set('title', 'Admin Panel | Human Trafficking Data');
		$this->set('selected', 'panel');
    	$this->layout = 'admin_panel_layout';
	}

}