<?php
App::uses('Casetable', 'Model');

/**
 * Casetable Test Case
 *
 */
class CasetableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.casetable'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Casetable = ClassRegistry::init('Casetable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Casetable);

		parent::tearDown();
	}

}
