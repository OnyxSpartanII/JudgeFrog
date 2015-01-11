<?php
/**
 * DefendantFixture
 *
 */
class DefendantFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'defendant';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'DefendantId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Firstname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Lastname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Gender' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'BirthDate' => array('type' => 'date', 'null' => false, 'default' => null),
		'Race' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'SentenceId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'ACDId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'DefendantId', 'unique' => 1),
			'Id_UNIQUE' => array('column' => 'DefendantId', 'unique' => 1),
			'fk_Case_SentenceId_idx' => array('column' => 'SentenceId', 'unique' => 0),
			'fk_Case_ACDId_idx' => array('column' => 'ACDId', 'unique' => 0)
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
			'DefendantId' => 1,
			'Firstname' => 'Lorem ipsum dolor sit amet',
			'Lastname' => 'Lorem ipsum dolor sit amet',
			'Gender' => 1,
			'BirthDate' => '2015-01-11',
			'Race' => 1,
			'SentenceId' => 1,
			'ACDId' => 1
		),
	);

}
