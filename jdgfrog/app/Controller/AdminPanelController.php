<?php

App::uses('AppController', 'Controller');

class AdminPanelController extends AppController {

	public $name = 'AdminPanel';

	public function beforeFilter() {
		//inspect user permissions here.
		parent::beforeFilter();
		$this->Auth->allow('panel');

	}

	public function index(){
		$this->render();
	}

	public function panel() {
		$this->set('title', 'Admin Panel | Human Trafficking Data');
		$this->set('selected', 'panel');
	}

}