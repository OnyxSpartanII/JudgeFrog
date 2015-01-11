<?php
App::uses('Defendant', 'Model');

/**
 * Defendant Test Case
 *
 */
class DefendantTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.defendant'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Defendant = ClassRegistry::init('Defendant');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Defendant);

		parent::tearDown();
	}

}
