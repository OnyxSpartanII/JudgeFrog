<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'home', 'about', 'methodology', 'principalInvestigators',
							'acknowledgements', 'searchDatabase', 'analyze', 'orgAndGovernment',
							'publicationsAndReports', 'federalStatutes','contact','additionalResources');
	}

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

/*
	The below functions display the view of that corresponding page by default. 
	Each function specifies the title of the view, which is assigned from the layout.	
*/

	public function home() {
		$this->set('title', 'Home | Human Trafficking Data');
		$this->set('selected', 'home');
	}

	public function about(){
		$this->set('title', 'About | Human Trafficking Data');
		$this->set('selected', 'about');
	}

	public function methodology() {
		$this->set('title', 'Methodology | Human Trafficking Data');
		$this->set('selected', 'about');
	}

	public function principalInvestigators() {
		$this->set('title', 'Principal Investigators | Human Trafficking Data');
		$this->set('selected', 'about');
	}

	public function acknowledgements() {
		$this->set('title', 'Acknowledgements | Human Trafficking Data');
		$this->set('selected', 'about');
	}

	public function searchDatabase() {
		$this->set('title', 'Database Search | Human Trafficking Data');
		$this->set('selected', 'search');
	}

	public function analyze() {
		$this->set('title', 'Analyze Data | Human Trafficking Data');
		$this->set('selected', 'analyze');
	}

	public function orgAndGovernment() {
		$this->set('title', 'Organizations | Human Trafficking Data');
		$this->set('selected', 'resources');
	}

	public function publicationsAndReports() {
		$this->set('title', 'Publications | Human Trafficking Data');
		$this->set('selected', 'resources');
	}

	public function federalStatutes() {
		$this->set('title', 'Federal Statutes | Human Trafficking Data');
		$this->set('selected', 'resources');
	}

	public function contact() {
		$this->set('title', 'Contact | Human Trafficking Data');
		$this->set('selected', 'contact');
	}
	
	public function additionalResources() {
		$this->set('title', 'Additional Resources | Human Trafficking Data');
		$this->set('selected', 'additionalResources');
	}

}
