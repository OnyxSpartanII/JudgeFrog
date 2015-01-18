<?php
/**
 * CaseObjectFixture
 *
 */
class CaseObjectFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'CaseId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Status' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'Num_Defendants' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'State' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'FederalDistrict' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'JudgeId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'victims_VictimsId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'CaseId', 'unique' => 1),
			'CaseId_UNIQUE' => array('column' => 'CaseId', 'unique' => 1),
			'Number_UNIQUE' => array('column' => 'Number', 'unique' => 1),
			'fk_Case_JudgeId_idx' => array('column' => 'JudgeId', 'unique' => 0),
			'fk_case_objects_victims1_idx' => array('column' => 'victims_VictimsId', 'unique' => 0)
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
			'CaseId' => 1,
			'Name' => 'Lorem ipsum dolor sit amet',
			'Number' => 'Lorem ipsum dolor sit amet',
			'Status' => 1,
			'Num_Defendants' => 1,
			'State' => '',
			'FederalDistrict' => 1,
			'JudgeId' => 1,
			'victims_VictimsId' => 1
		),
	);

}
