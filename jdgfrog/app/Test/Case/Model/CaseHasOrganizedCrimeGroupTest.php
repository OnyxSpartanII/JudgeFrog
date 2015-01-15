<?php
App::uses('CaseHasOrganizedCrimeGroup', 'Model');

/**
 * CaseHasOrganizedCrimeGroup Test Case
 *
 */
class CaseHasOrganizedCrimeGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.case_has_organized_crime_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CaseHasOrganizedCrimeGroup = ClassRegistry::init('CaseHasOrganizedCrimeGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CaseHasOrganizedCrimeGroup);

		parent::tearDown();
	}

}
