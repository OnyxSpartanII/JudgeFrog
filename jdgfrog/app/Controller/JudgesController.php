<?php
App::uses('AppController', 'Controller');
/**
 * Judges Controller
 *
 * @property Judge $Judge
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class JudgesController extends AppController {

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
		$this->Judge->recursive = 0;
		$this->set('judges', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Judge->exists($id)) {
			throw new NotFoundException(__('Invalid judge'));
		}
		$options = array('conditions' => array('Judge.' . $this->Judge->primaryKey => $id));
		$this->set('judge', $this->Judge->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Judge->create();
			if ($this->Judge->save($this->request->data)) {
				$this->Session->setFlash(__('The judge has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The judge could not be saved. Please, try again.'));
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
		if (!$this->Judge->exists($id)) {
			throw new NotFoundException(__('Invalid judge'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Judge->save($this->request->data)) {
				$this->Session->setFlash(__('The judge has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The judge could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Judge.' . $this->Judge->primaryKey => $id));
			$this->request->data = $this->Judge->find('first', $options);
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
		$this->Judge->id = $id;
		if (!$this->Judge->exists()) {
			throw new NotFoundException(__('Invalid judge'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Judge->delete()) {
			$this->Session->setFlash(__('The judge has been deleted.'));
		} else {
			$this->Session->setFlash(__('The judge could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
