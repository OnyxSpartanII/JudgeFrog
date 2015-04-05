<?php

App::uses('AppController', 'Controller');

class AdminPanelController extends AppController {

	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session', 'Paginator');
	public $name = 'AdminPanel';
	public $uses = array('DataInProgress', 'CaseSession');

	public function beforeFilter() {
		//inspect user permissions here.
		parent::beforeFilter();
		// $this->Auth->allow('createCase', 'createCaseSetup', 'saveSession', 'saveStep', 'index', 'create_case');
		// $this->Auth->allow('index', 'create_case', 'edit', 'review', 'manageusers');

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
		$this->set('title', 'Case Edition - Admin Panel | Human Trafficking Data');
		$this->layout = 'admin_panel_layout';
		$this->set('active', 'edit');

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
		//debug($data);
		$this->set('data', $data);
		$this->render('edit');	
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

	public function autoComplete() {
		$this->autoRender = false;

		$term = trim(strip_tags($_GET['term']));

		$data = $this->DataInProgress->find('all', array(
			'fields' => array(
					'DISTINCT CaseNum',
					'CaseNam'
				),
			'conditions' => array(
				'OR' => array(
					'DataInProgress.CaseNum LIKE' => '%' . $term . '%',
					'DataInProgress.CaseNam LIKE' => '%' . $term .'%'
				)
			)
		));

		$vals = array();
		$index = 0;
		foreach ($data as $d) {
			if ($index++ > 9) break;
			array_push($vals, array(
					'label'=> $d['DataInProgress']['CaseNum'] . ' / ' . $d['DataInProgress']['CaseNam'],
					'value'=> $d['DataInProgress']['CaseNum']
				)
			);
		}

		echo json_encode($vals);
	}

}