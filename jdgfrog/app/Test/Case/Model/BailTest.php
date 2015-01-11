<?php
App::uses('Bail', 'Model');

/**
 * Bail Test Case
 *
 */
class BailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bail = ClassRegistry::init('Bail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bail);

		parent::tearDown();
	}

}
