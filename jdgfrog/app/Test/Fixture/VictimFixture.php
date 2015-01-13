<?php
/**
 * VictimFixture
 *
 */
class VictimFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'VictimsId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Total' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Minor' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Foreigner' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Female' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cases_CaseId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'VictimsId', 'unique' => 1),
			'VictimsId_UNIQUE' => array('column' => 'VictimsId', 'unique' => 1),
			'fk_victims_cases1_idx' => array('column' => 'cases_CaseId', 'unique' => 0)
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
			'VictimsId' => 1,
			'Total' => 1,
			'Minor' => 1,
			'Foreigner' => 1,
			'Female' => 1,
			'cases_CaseId' => 1
		),
	);

}
