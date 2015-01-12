<?php
App::uses('AppController', 'Controller');
/**
 * Sentences Controller
 *
 * @property Sentence $Sentence
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SentencesController extends AppController {

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
		$this->Sentence->recursive = 0;
		$this->set('sentences', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sentence->exists($id)) {
			throw new NotFoundException(__('Invalid sentence'));
		}
		$options = array('conditions' => array('Sentence.' . $this->Sentence->primaryKey => $id));
		$this->set('sentence', $this->Sentence->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sentence->create();
			if ($this->Sentence->save($this->request->data)) {
				$this->Session->setFlash(__('The sentence has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sentence could not be saved. Please, try again.'));
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
		if (!$this->Sentence->exists($id)) {
			throw new NotFoundException(__('Invalid sentence'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sentence->save($this->request->data)) {
				$this->Session->setFlash(__('The sentence has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sentence could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sentence.' . $this->Sentence->primaryKey => $id));
			$this->request->data = $this->Sentence->find('first', $options);
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
		$this->Sentence->id = $id;
		if (!$this->Sentence->exists()) {
			throw new NotFoundException(__('Invalid sentence'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Sentence->delete()) {
			$this->Session->setFlash(__('The sentence has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sentence could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
