<?php

class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'logout', 'create');
	}

	public function login() {
		//$this->layout = false;
		$this->set('title', 'Login | Human Trafficking Data');

		/*if ($this->Session->check('Auth.User')) 
		{
			$this->redirect(array('action' => 'index'));
		}*/

		if ($this->request->is('post')) 
		{
			if ($this->Auth->login())
			{
				$this->Session->setFlash(__('Welcome, ' . $this->Auth->user('username')));
				$this->redirect($this->Auth->redirectUrl());
			}
			else 
			{
				$this->Session->setFlash(__('Invalid username or password'));
			}
		}
	}


	public function logout() {
		$this->redirect($this->Auth->logout());
	}


	public function create() {

		if ($this->request->is('post')) 
		{
			$this->User->create();

			//Save only the listed fields in the model to the database.
			if ($this->User->save($this->request->data, array('username', 'role', 'created', 'modified', 'password_hash'))) 
			{
				$this->Session->setFlash(__('User created.'));
				return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
			}
			$this->Session->setFlash(__('User could not be created.'));
			$this->Session->setFlash(__(print_r($this->request->data)));
		}
	}

	public function edit() {

	}

	public function delete() {

	}


	// Method will generate a one-time use code for use during account creation.
	public function generateCode() {

	}
}