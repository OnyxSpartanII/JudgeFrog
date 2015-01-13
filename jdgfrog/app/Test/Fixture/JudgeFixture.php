<?php
/**
 * JudgeFixture
 *
 */
class JudgeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'JudgeId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Race' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Gender' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'Tenure' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'AppointedBy' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'JudgeId', 'unique' => 1),
			'JudgeId_UNIQUE' => array('column' => 'JudgeId', 'unique' => 1)
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
			'JudgeId' => 1,
			'Name' => 'Lorem ipsum dolor sit amet',
			'Race' => 1,
			'Gender' => 1,
			'Tenure' => 1,
			'AppointedBy' => 1
		),
	);

}
