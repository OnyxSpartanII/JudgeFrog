<?php
App::uses('AppController', 'Controller');
/**
 * ArrestChargeDetails Controller
 *
 * @property ArrestChargeDetail $ArrestChargeDetail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ArrestChargeDetailsController extends AppController {

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
		$this->ArrestChargeDetail->recursive = 0;
		$this->set('arrestChargeDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ArrestChargeDetail->exists($id)) {
			throw new NotFoundException(__('Invalid arrest charge detail'));
		}
		$options = array('conditions' => array('ArrestChargeDetail.' . $this->ArrestChargeDetail->primaryKey => $id));
		$this->set('arrestChargeDetail', $this->ArrestChargeDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ArrestChargeDetail->create();
			if ($this->ArrestChargeDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The arrest charge detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The arrest charge detail could not be saved. Please, try again.'));
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
		if (!$this->ArrestChargeDetail->exists($id)) {
			throw new NotFoundException(__('Invalid arrest charge detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ArrestChargeDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The arrest charge detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The arrest charge detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ArrestChargeDetail.' . $this->ArrestChargeDetail->primaryKey => $id));
			$this->request->data = $this->ArrestChargeDetail->find('first', $options);
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
		$this->ArrestChargeDetail->id = $id;
		if (!$this->ArrestChargeDetail->exists()) {
			throw new NotFoundException(__('Invalid arrest charge detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ArrestChargeDetail->delete()) {
			$this->Session->setFlash(__('The arrest charge detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The arrest charge detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
