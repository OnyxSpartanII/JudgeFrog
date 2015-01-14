<?php
App::uses('AppController', 'Controller');
/**
 * CaseObjects Controller
 *
 * @property CaseObject $CaseObject
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CaseObjectsController extends AppController {

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
		$this->CaseObject->recursive = 0;
		$this->set('caseObjects', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CaseObject->exists($id)) {
			throw new NotFoundException(__('Invalid case object'));
		}
		$options = array('conditions' => array('CaseObject.' . $this->CaseObject->primaryKey => $id));
		$this->set('caseObject', $this->CaseObject->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CaseObject->create();
			if ($this->CaseObject->save($this->request->data)) {
				$this->Session->setFlash(__('The case object has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case object could not be saved. Please, try again.'));
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
		if (!$this->CaseObject->exists($id)) {
			throw new NotFoundException(__('Invalid case object'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CaseObject->save($this->request->data)) {
				$this->Session->setFlash(__('The case object has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case object could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CaseObject.' . $this->CaseObject->primaryKey => $id));
			$this->request->data = $this->CaseObject->find('first', $options);
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
		$this->CaseObject->id = $id;
		if (!$this->CaseObject->exists()) {
			throw new NotFoundException(__('Invalid case object'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseObject->delete()) {
			$this->Session->setFlash(__('The case object has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case object could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
