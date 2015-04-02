<!-- AnalyzeController.php -->

<?php

class AnalyzeController extends AppController {
	
	public $uses = array('Datum');

	public $helpers = array('Html', 'Form');

	/**
	 * Controller name
	 */
	public $name = 'Analyze';

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'line');
	}

	public function index() {
		$cases = $this->Session->read('case_info');
	}

	public function generateGraph() {

	}

}