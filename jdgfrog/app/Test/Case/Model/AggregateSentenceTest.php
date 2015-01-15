<?php
App::uses('AggregateSentence', 'Model');

/**
 * AggregateSentence Test Case
 *
 */
class AggregateSentenceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aggregate_sentence'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AggregateSentence = ClassRegistry::init('AggregateSentence');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AggregateSentence);

		parent::tearDown();
	}

}
