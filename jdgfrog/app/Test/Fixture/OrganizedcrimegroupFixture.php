<?php
/**
 * OrganizedcrimegroupFixture
 *
 */
class OrganizedcrimegroupFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'organizedcrimegroup';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'OCGId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Size' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Scope' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Race' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'OCGId', 'unique' => 1),
			'OCGId_UNIQUE' => array('column' => 'OCGId', 'unique' => 1)
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
			'OCGId' => 1,
			'Name' => 'Lorem ipsum dolor sit amet',
			'Size' => 1,
			'Scope' => 1,
			'Race' => 1
		),
	);

}
