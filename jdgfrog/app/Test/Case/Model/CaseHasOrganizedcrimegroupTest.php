<?php
App::uses('CaseHasOrganizedcrimegroup', 'Model');

/**
 * CaseHasOrganizedcrimegroup Test Case
 *
 */
class CaseHasOrganizedcrimegroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.case_has_organizedcrimegroup'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CaseHasOrganizedcrimegroup = ClassRegistry::init('CaseHasOrganizedcrimegroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CaseHasOrganizedcrimegroup);

		parent::tearDown();
	}

}
