<?php
App::uses('AppController', 'Controller');
/**
 * Bails Controller
 *
 * @property Bail $Bail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BailsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Bail->recursive = 0;
		$this->set('bails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bail->exists($id)) {
			throw new NotFoundException(__('Invalid bail'));
		}
		$options = array('conditions' => array('Bail.' . $this->Bail->primaryKey => $id));
		$this->set('bail', $this->Bail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bail->create();
			if ($this->Bail->save($this->request->data)) {
				$this->Session->setFlash(__('The bail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bail could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bail->exists($id)) {
			throw new NotFoundException(__('Invalid bail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bail->save($this->request->data)) {
				$this->Session->setFlash(__('The bail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bail.' . $this->Bail->primaryKey => $id));
			$this->request->data = $this->Bail->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bail->id = $id;
		if (!$this->Bail->exists()) {
			throw new NotFoundException(__('Invalid bail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Bail->delete()) {
			$this->Session->setFlash(__('The bail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
