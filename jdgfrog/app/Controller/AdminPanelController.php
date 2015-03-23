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
		$this->Auth->allow('createCase', 'createCaseSetup', 'saveSession', 'saveStep');

	}


	public function index(){
    	$this->layout = 'admin_panel_layout';
		$this->set('title', 'Home - Admin Panel | Human Trafficking Data');
		$this->set('active', 'index');
	}

	public function create_case(){
    	$this->layout = 'admin_panel_layout';
		$this->set('title', 'Create - Admin Panel | Human Trafficking Data');
		$this->set('active', 'create_case');
	}

	public function edit(){
		$this->set('title', 'Edit - Admin Panel | Human Trafficking Data');
    	$this->layout = 'admin_panel_layout';
		$this->set('active', 'edit');
	}

	public function review(){
    	$this->layout = 'admin_panel_layout';
		$this->set('title', 'Review - Admin Panel | Human Trafficking Data');
		$this->set('active', 'review');
	}

	public function manageusers(){
    	$this->layout = 'admin_panel_layout';
		$this->set('title', 'Manage Users - Admin Panel | Human Trafficking Data');
		$this->set('active', 'manageusers');
	}
	
	public function panel() {
    	$this->layout = 'admin_panel_layout';
		$this->set('title', 'Admin Panel | Human Trafficking Data');
		$this->set('active', 'panel');
	}

}