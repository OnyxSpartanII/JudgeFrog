<?php
App::uses('Arrestchargedetail', 'Model');

/**
 * Arrestchargedetail Test Case
 *
 */
class ArrestchargedetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.arrestchargedetail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Arrestchargedetail = ClassRegistry::init('Arrestchargedetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Arrestchargedetail);

		parent::tearDown();
	}

}
