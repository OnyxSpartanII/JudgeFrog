<?php
App::uses('ArrestChargeDetail', 'Model');

/**
 * ArrestChargeDetail Test Case
 *
 */
class ArrestChargeDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.arrest_charge_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ArrestChargeDetail = ClassRegistry::init('ArrestChargeDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ArrestChargeDetail);

		parent::tearDown();
	}

}
