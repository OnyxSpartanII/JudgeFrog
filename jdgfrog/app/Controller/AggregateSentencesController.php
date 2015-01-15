<?php
App::uses('AppController', 'Controller');
/**
 * AggregateSentences Controller
 *
 * @property AggregateSentence $AggregateSentence
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AggregateSentencesController extends AppController {

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
		$this->AggregateSentence->recursive = 0;
		$this->set('aggregateSentences', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AggregateSentence->exists($id)) {
			throw new NotFoundException(__('Invalid aggregate sentence'));
		}
		$options = array('conditions' => array('AggregateSentence.' . $this->AggregateSentence->primaryKey => $id));
		$this->set('aggregateSentence', $this->AggregateSentence->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AggregateSentence->create();
			if ($this->AggregateSentence->save($this->request->data)) {
				$this->Session->setFlash(__('The aggregate sentence has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aggregate sentence could not be saved. Please, try again.'));
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
		if (!$this->AggregateSentence->exists($id)) {
			throw new NotFoundException(__('Invalid aggregate sentence'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AggregateSentence->save($this->request->data)) {
				$this->Session->setFlash(__('The aggregate sentence has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aggregate sentence could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AggregateSentence.' . $this->AggregateSentence->primaryKey => $id));
			$this->request->data = $this->AggregateSentence->find('first', $options);
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
		$this->AggregateSentence->id = $id;
		if (!$this->AggregateSentence->exists()) {
			throw new NotFoundException(__('Invalid aggregate sentence'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AggregateSentence->delete()) {
			$this->Session->setFlash(__('The aggregate sentence has been deleted.'));
		} else {
			$this->Session->setFlash(__('The aggregate sentence could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
