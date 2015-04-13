<?php

class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'logout');
	}

	/**
	 * use beforeRender to send session parameters to the layout view
	 */
	public function beforeRender() {
		parent::beforeRender();
		$params = $this->Session->read('form.params');
		$this->set('params', $params);
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
				$this->Session->setFlash(__('Welcome back ' . $this->Auth->user('first_name') . '!'));
				$this->redirect(array('controller' => 'AdminPanel', 'action' => 'index'));

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

		if ($this->request->is('post')) {
				{
					$this->User->create();

					//Save only the listed fields in the model to the database.
					if ($this->User->save($this->request->data, array('username', 'first_name', 'last_name', 'role', 'created', 'modified', 'password_hash'))) 
					{
						$this->Session->setFlash(__('User Successfully Created!'));

						return $this->redirect(array('controller' => 'users', 'action' => 'create'));
					}
					
						$this->Session->setFlash(__('Sorry the user could not be created!'));
						// $this->Session->setFlash(__(print_r($this->request->data)));
					
				}
		}
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