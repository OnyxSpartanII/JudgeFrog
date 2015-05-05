<?php
/**
 * CaseHasDefendantFixture
 *
 */
class CaseHasDefendantFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'CaseId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'DefendantId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('CaseId', 'DefendantId'), 'unique' => 1),
			'fk_cases_has_defendants_defendants1_idx' => array('column' => 'DefendantId', 'unique' => 0),
			'fk_cases_has_defendants_cases1_idx' => array('column' => 'CaseId', 'unique' => 0)
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
			'DefendantId' => 1
		),
	);

}
