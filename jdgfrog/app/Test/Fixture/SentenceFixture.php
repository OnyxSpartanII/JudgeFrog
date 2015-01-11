<?php
/**
 * SentenceFixture
 *
 */
class SentenceFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'sentence';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'SentenceId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'DateTerminated' => array('type' => 'date', 'null' => false, 'default' => null),
		'Date' => array('type' => 'date', 'null' => false, 'default' => null),
		'Total' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Restitution' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'AssetForfeit' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'Appeal' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'SupervisedRelease' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Probation' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'SentenceId', 'unique' => 1),
			'SentenceId_UNIQUE' => array('column' => 'SentenceId', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'SentenceId' => 1,
			'DateTerminated' => '2015-01-11',
			'Date' => '2015-01-11',
			'Total' => 1,
			'Restitution' => 1,
			'AssetForfeit' => 1,
			'Appeal' => 1,
			'SupervisedRelease' => 1,
			'Probation' => 1
		),
	);

}
