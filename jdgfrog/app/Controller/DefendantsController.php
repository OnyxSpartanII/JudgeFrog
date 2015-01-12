<?php
App::uses('AppController', 'Controller');
/**
 * Defendants Controller
 *
 * @property Defendant $Defendant
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DefendantsController extends AppController {

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
		$this->Defendant->recursive = 0;
		$this->set('defendants', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Defendant->exists($id)) {
			throw new NotFoundException(__('Invalid defendant'));
		}
		$options = array('conditions' => array('Defendant.' . $this->Defendant->primaryKey => $id));
		$this->set('defendant', $this->Defendant->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Defendant->create();
			if ($this->Defendant->save($this->request->data)) {
				$this->Session->setFlash(__('The defendant has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The defendant could not be saved. Please, try again.'));
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
		if (!$this->Defendant->exists($id)) {
			throw new NotFoundException(__('Invalid defendant'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Defendant->save($this->request->data)) {
				$this->Session->setFlash(__('The defendant has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The defendant could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Defendant.' . $this->Defendant->primaryKey => $id));
			$this->request->data = $this->Defendant->find('first', $options);
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
		$this->Defendant->id = $id;
		if (!$this->Defendant->exists()) {
			throw new NotFoundException(__('Invalid defendant'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Defendant->delete()) {
			$this->Session->setFlash(__('The defendant has been deleted.'));
		} else {
			$this->Session->setFlash(__('The defendant could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
