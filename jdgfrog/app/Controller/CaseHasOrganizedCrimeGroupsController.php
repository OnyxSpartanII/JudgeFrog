<?php
App::uses('AppController', 'Controller');
/**
 * CaseHasOrganizedCrimeGroups Controller
 *
 * @property CaseHasOrganizedCrimeGroup $CaseHasOrganizedCrimeGroup
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CaseHasOrganizedCrimeGroupsController extends AppController {

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
		$this->CaseHasOrganizedCrimeGroup->recursive = 0;
		$this->set('caseHasOrganizedCrimeGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CaseHasOrganizedCrimeGroup->exists($id)) {
			throw new NotFoundException(__('Invalid case has organized crime group'));
		}
		$options = array('conditions' => array('CaseHasOrganizedCrimeGroup.' . $this->CaseHasOrganizedCrimeGroup->primaryKey => $id));
		$this->set('caseHasOrganizedCrimeGroup', $this->CaseHasOrganizedCrimeGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CaseHasOrganizedCrimeGroup->create();
			if ($this->CaseHasOrganizedCrimeGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The case has organized crime group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case has organized crime group could not be saved. Please, try again.'));
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
		if (!$this->CaseHasOrganizedCrimeGroup->exists($id)) {
			throw new NotFoundException(__('Invalid case has organized crime group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CaseHasOrganizedCrimeGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The case has organized crime group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case has organized crime group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CaseHasOrganizedCrimeGroup.' . $this->CaseHasOrganizedCrimeGroup->primaryKey => $id));
			$this->request->data = $this->CaseHasOrganizedCrimeGroup->find('first', $options);
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
		$this->CaseHasOrganizedCrimeGroup->id = $id;
		if (!$this->CaseHasOrganizedCrimeGroup->exists()) {
			throw new NotFoundException(__('Invalid case has organized crime group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseHasOrganizedCrimeGroup->delete()) {
			$this->Session->setFlash(__('The case has organized crime group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case has organized crime group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
