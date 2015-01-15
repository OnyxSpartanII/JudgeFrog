<?php
App::uses('Judge', 'Model');

/**
 * Judge Test Case
 *
 */
class JudgeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.judge'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Judge = ClassRegistry::init('Judge');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Judge);

		parent::tearDown();
	}

}
