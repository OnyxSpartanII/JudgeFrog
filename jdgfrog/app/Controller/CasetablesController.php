<?php
App::uses('AppController', 'Controller');
/**
 * Casetables Controller
 *
 * @property Casetable $Casetable
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CasetablesController extends AppController {

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
		$this->Casetable->recursive = 0;
		$this->set('casetables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Casetable->exists($id)) {
			throw new NotFoundException(__('Invalid casetable'));
		}
		$options = array('conditions' => array('Casetable.' . $this->Casetable->primaryKey => $id));
		$this->set('casetable', $this->Casetable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Casetable->create();
			if ($this->Casetable->save($this->request->data)) {
				$this->Session->setFlash(__('The casetable has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetable could not be saved. Please, try again.'));
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
		if (!$this->Casetable->exists($id)) {
			throw new NotFoundException(__('Invalid casetable'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Casetable->save($this->request->data)) {
				$this->Session->setFlash(__('The casetable has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetable could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Casetable.' . $this->Casetable->primaryKey => $id));
			$this->request->data = $this->Casetable->find('first', $options);
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
		$this->Casetable->id = $id;
		if (!$this->Casetable->exists()) {
			throw new NotFoundException(__('Invalid casetable'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Casetable->delete()) {
			$this->Session->setFlash(__('The casetable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The casetable could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
