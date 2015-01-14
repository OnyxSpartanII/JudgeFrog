<?php
App::uses('AppController', 'Controller');
/**
 * OrganizedCrimeGroups Controller
 *
 * @property OrganizedCrimeGroup $OrganizedCrimeGroup
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OrganizedCrimeGroupsController extends AppController {

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
		$this->OrganizedCrimeGroup->recursive = 0;
		$this->set('organizedCrimeGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrganizedCrimeGroup->exists($id)) {
			throw new NotFoundException(__('Invalid organized crime group'));
		}
		$options = array('conditions' => array('OrganizedCrimeGroup.' . $this->OrganizedCrimeGroup->primaryKey => $id));
		$this->set('organizedCrimeGroup', $this->OrganizedCrimeGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrganizedCrimeGroup->create();
			if ($this->OrganizedCrimeGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The organized crime group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organized crime group could not be saved. Please, try again.'));
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
		if (!$this->OrganizedCrimeGroup->exists($id)) {
			throw new NotFoundException(__('Invalid organized crime group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrganizedCrimeGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The organized crime group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organized crime group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrganizedCrimeGroup.' . $this->OrganizedCrimeGroup->primaryKey => $id));
			$this->request->data = $this->OrganizedCrimeGroup->find('first', $options);
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
		$this->OrganizedCrimeGroup->id = $id;
		if (!$this->OrganizedCrimeGroup->exists()) {
			throw new NotFoundException(__('Invalid organized crime group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrganizedCrimeGroup->delete()) {
			$this->Session->setFlash(__('The organized crime group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The organized crime group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
