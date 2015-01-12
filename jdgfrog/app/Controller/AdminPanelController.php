<?php

App::uses('AppController', 'Controller');

class AdminPanelController extends AppController {


	public function beforeFilter() {
		//inspect user permissions here.
		parent::beforeFilter();

	}

	public function index(){
		$this->render();
	}

}