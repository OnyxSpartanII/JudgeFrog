<?php
App::uses('CaseObject', 'Model');

/**
 * CaseObject Test Case
 *
 */
class CaseObjectTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.case_object'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CaseObject = ClassRegistry::init('CaseObject');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CaseObject);

		parent::tearDown();
	}

}
