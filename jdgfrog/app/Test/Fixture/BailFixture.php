<?php
/**
 * BailFixture
 *
 */
class BailFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'bail';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'BailId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Type' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'Amount' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'ArrestChargeDetails_ACDId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'BailId', 'unique' => 1),
			'BailId_UNIQUE' => array('column' => 'BailId', 'unique' => 1),
			'fk_Bail_ArrestChargeDetails1_idx' => array('column' => 'ArrestChargeDetails_ACDId', 'unique' => 0)
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
			'BailId' => 1,
			'Type' => 1,
			'Amount' => 1,
			'ArrestChargeDetails_ACDId' => 1
		),
	);

}
