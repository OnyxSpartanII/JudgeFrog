<?php

class UploadsController extends AppController {

	/**
	 * Controller name
	 */
	public $name = 'Uploads';

	/**
	 * This controller does not use a model
	 */
	public $uses = array();

	public $helpers = array('Html', 'Form');

	public function add() {
		/* if form is submitted */
		if ($this->request->is('post')) {
			$filename = "./files/".$this->data['Uploads']['file']['name'];
			/* copy uploaded file */
			if (move_uploaded_file($this->data['Uploads']['file']['tmp_name'],$filename)) {
				$this->Session->setFlash('File uploaded successfully!');
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash('File upload failed!');
			}
		}
		$this->render('add');
	}
}