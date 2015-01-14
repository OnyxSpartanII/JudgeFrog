<?php
App::uses('AppController', 'Controller');
/**
 * Arrestchargedetails Controller
 *
 * @property Arrestchargedetail $Arrestchargedetail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ArrestchargedetailsController extends AppController {

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
		$this->Arrestchargedetail->recursive = 0;
		$this->set('arrestchargedetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Arrestchargedetail->exists($id)) {
			throw new NotFoundException(__('Invalid arrestchargedetail'));
		}
		$options = array('conditions' => array('Arrestchargedetail.' . $this->Arrestchargedetail->primaryKey => $id));
		$this->set('arrestchargedetail', $this->Arrestchargedetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Arrestchargedetail->create();
			if ($this->Arrestchargedetail->save($this->request->data)) {
				$this->Session->setFlash(__('The arrestchargedetail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The arrestchargedetail could not be saved. Please, try again.'));
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
		if (!$this->Arrestchargedetail->exists($id)) {
			throw new NotFoundException(__('Invalid arrestchargedetail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Arrestchargedetail->save($this->request->data)) {
				$this->Session->setFlash(__('The arrestchargedetail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The arrestchargedetail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Arrestchargedetail.' . $this->Arrestchargedetail->primaryKey => $id));
			$this->request->data = $this->Arrestchargedetail->find('first', $options);
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
		$this->Arrestchargedetail->id = $id;
		if (!$this->Arrestchargedetail->exists()) {
			throw new NotFoundException(__('Invalid arrestchargedetail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Arrestchargedetail->delete()) {
			$this->Session->setFlash(__('The arrestchargedetail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The arrestchargedetail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
