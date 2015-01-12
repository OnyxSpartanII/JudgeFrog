<?php
App::uses('AppController', 'Controller');
/**
 * Victims Controller
 *
 * @property Victim $Victim
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class VictimsController extends AppController {

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
		$this->Victim->recursive = 0;
		$this->set('victims', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Victim->exists($id)) {
			throw new NotFoundException(__('Invalid victim'));
		}
		$options = array('conditions' => array('Victim.' . $this->Victim->primaryKey => $id));
		$this->set('victim', $this->Victim->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Victim->create();
			if ($this->Victim->save($this->request->data)) {
				$this->Session->setFlash(__('The victim has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The victim could not be saved. Please, try again.'));
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
		if (!$this->Victim->exists($id)) {
			throw new NotFoundException(__('Invalid victim'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Victim->save($this->request->data)) {
				$this->Session->setFlash(__('The victim has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The victim could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Victim.' . $this->Victim->primaryKey => $id));
			$this->request->data = $this->Victim->find('first', $options);
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
		$this->Victim->id = $id;
		if (!$this->Victim->exists()) {
			throw new NotFoundException(__('Invalid victim'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Victim->delete()) {
			$this->Session->setFlash(__('The victim has been deleted.'));
		} else {
			$this->Session->setFlash(__('The victim could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
