<?php
App::uses('Organizedcrimegroup', 'Model');

/**
 * Organizedcrimegroup Test Case
 *
 */
class OrganizedcrimegroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.organizedcrimegroup'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Organizedcrimegroup = ClassRegistry::init('Organizedcrimegroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Organizedcrimegroup);

		parent::tearDown();
	}

}
