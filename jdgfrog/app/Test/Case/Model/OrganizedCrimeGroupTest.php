<?php
App::uses('OrganizedCrimeGroup', 'Model');

/**
 * OrganizedCrimeGroup Test Case
 *
 */
class OrganizedCrimeGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.organized_crime_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrganizedCrimeGroup = ClassRegistry::init('OrganizedCrimeGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrganizedCrimeGroup);

		parent::tearDown();
	}

}
