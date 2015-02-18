<?php
App::uses('CaseSession', 'Model');

/**
 * CaseSession Test Case
 *
 */
class CaseSessionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.case_session'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CaseSession = ClassRegistry::init('CaseSession');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CaseSession);

		parent::tearDown();
	}

}
