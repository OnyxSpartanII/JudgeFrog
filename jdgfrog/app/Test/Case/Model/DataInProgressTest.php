<?php
App::uses('DataInProgress', 'Model');

/**
 * DataInProgress Test Case
 *
 */
class DataInProgressTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.data_in_progress'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DataInProgress = ClassRegistry::init('DataInProgress');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DataInProgress);

		parent::tearDown();
	}

}
