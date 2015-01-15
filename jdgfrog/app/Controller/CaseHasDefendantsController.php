<?php
App::uses('AppController', 'Controller');
/**
 * CaseHasDefendants Controller
 *
 * @property CaseHasDefendant $CaseHasDefendant
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CaseHasDefendantsController extends AppController {

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
		$this->CaseHasDefendant->recursive = 0;
		$this->set('caseHasDefendants', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CaseHasDefendant->exists($id)) {
			throw new NotFoundException(__('Invalid case has defendant'));
		}
		$options = array('conditions' => array('CaseHasDefendant.' . $this->CaseHasDefendant->primaryKey => $id));
		$this->set('caseHasDefendant', $this->CaseHasDefendant->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CaseHasDefendant->create();
			if ($this->CaseHasDefendant->save($this->request->data)) {
				$this->Session->setFlash(__('The case has defendant has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case has defendant could not be saved. Please, try again.'));
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
		if (!$this->CaseHasDefendant->exists($id)) {
			throw new NotFoundException(__('Invalid case has defendant'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CaseHasDefendant->save($this->request->data)) {
				$this->Session->setFlash(__('The case has defendant has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case has defendant could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CaseHasDefendant.' . $this->CaseHasDefendant->primaryKey => $id));
			$this->request->data = $this->CaseHasDefendant->find('first', $options);
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
		$this->CaseHasDefendant->id = $id;
		if (!$this->CaseHasDefendant->exists()) {
			throw new NotFoundException(__('Invalid case has defendant'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseHasDefendant->delete()) {
			$this->Session->setFlash(__('The case has defendant has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case has defendant could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
