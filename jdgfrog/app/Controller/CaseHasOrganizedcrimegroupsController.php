<?php
App::uses('AppController', 'Controller');
/**
 * CaseHasOrganizedcrimegroups Controller
 *
 * @property CaseHasOrganizedcrimegroup $CaseHasOrganizedcrimegroup
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CaseHasOrganizedcrimegroupsController extends AppController {

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
		$this->CaseHasOrganizedcrimegroup->recursive = 0;
		$this->set('caseHasOrganizedcrimegroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CaseHasOrganizedcrimegroup->exists($id)) {
			throw new NotFoundException(__('Invalid case has organizedcrimegroup'));
		}
		$options = array('conditions' => array('CaseHasOrganizedcrimegroup.' . $this->CaseHasOrganizedcrimegroup->primaryKey => $id));
		$this->set('caseHasOrganizedcrimegroup', $this->CaseHasOrganizedcrimegroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CaseHasOrganizedcrimegroup->create();
			if ($this->CaseHasOrganizedcrimegroup->save($this->request->data)) {
				$this->Session->setFlash(__('The case has organizedcrimegroup has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case has organizedcrimegroup could not be saved. Please, try again.'));
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
		if (!$this->CaseHasOrganizedcrimegroup->exists($id)) {
			throw new NotFoundException(__('Invalid case has organizedcrimegroup'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CaseHasOrganizedcrimegroup->save($this->request->data)) {
				$this->Session->setFlash(__('The case has organizedcrimegroup has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The case has organizedcrimegroup could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CaseHasOrganizedcrimegroup.' . $this->CaseHasOrganizedcrimegroup->primaryKey => $id));
			$this->request->data = $this->CaseHasOrganizedcrimegroup->find('first', $options);
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
		$this->CaseHasOrganizedcrimegroup->id = $id;
		if (!$this->CaseHasOrganizedcrimegroup->exists()) {
			throw new NotFoundException(__('Invalid case has organizedcrimegroup'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CaseHasOrganizedcrimegroup->delete()) {
			$this->Session->setFlash(__('The case has organizedcrimegroup has been deleted.'));
		} else {
			$this->Session->setFlash(__('The case has organizedcrimegroup could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
