<?php
App::uses('Sentence', 'Model');

/**
 * Sentence Test Case
 *
 */
class SentenceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sentence'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sentence = ClassRegistry::init('Sentence');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sentence);

		parent::tearDown();
	}

}
