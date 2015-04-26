<?php

class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'logout');
		$uses = array('users');
	}

	/**
	 * use beforeRender to send session parameters to the layout view
	 */
	public function beforeRender() {
		parent::beforeRender();

	}

	public function isAuthorized($user) {
		
		if ($this->action === 'login' || $this->action === 'logout') {
			return true;
		}
		
		return parent::isAuthorized($user);
	}

	public function login() {
		$this->set('title', 'Login | Human Trafficking Data');
		if ($this->request->is('post')) {

			if ($this->Auth->login()) {

				$this->Session->setFlash(__('Welcome back ' . $this->Auth->user('first_name') . '!'));
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function create() {

		if ($this->request->is('post')) {
			$this->User->create();

			//Save only the listed fields in the model to the database.
			if ($this->User->save($this->request->data, array(
														'username', 
														'first_name', 
														'last_name', 
														'role', 
														'created', 
														'modified', 
														'password_hash'
														)
								)
				) {
				$this->Session->setFlash(__('User Successfully Created!'));
				return $this->redirect(array('controller' => 'users', 'action' => 'create'));
			} else {
				$this->Session->setFlash(__('Sorry the user could not be created!'));
			}
		}
		// Fetch current users from users table
		$allUsers = $this->User->find('all', array(
											'fields' => array(
															'User.username', 
															'User.first_name', 
															'User.last_name', 
															'User.role'),
											'group' => 'User.username'
											)
										);
		$this->set('showUsers', $allUsers);

	}

	public function delete_user($username = null){
		$this->User->delete($username, true);
		$this->Session->setFlash('User Successfully Deleted!');
		$this->redirect(array('controller' => 'Users', 'action' => 'create'));
	}


	// Method will generate a one-time use code for use during account creation.
	public function generateCode() {

	}
}