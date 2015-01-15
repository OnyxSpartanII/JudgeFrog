<?php
App::uses('CaseHasDefendant', 'Model');

/**
 * CaseHasDefendant Test Case
 *
 */
class CaseHasDefendantTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.case_has_defendant'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CaseHasDefendant = ClassRegistry::init('CaseHasDefendant');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CaseHasDefendant);

		parent::tearDown();
	}

}
