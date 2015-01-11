<?php
/**
 * CaseHasDefendantFixture
 *
 */
class CaseHasDefendantFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'case_has_defendant';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'Case_CaseId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Defendant_DefendantId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('Case_CaseId', 'Defendant_DefendantId'), 'unique' => 1),
			'fk_Case_has_Defendant_Defendant1_idx' => array('column' => 'Defendant_DefendantId', 'unique' => 0),
			'fk_Case_has_Defendant_Case_idx' => array('column' => 'Case_CaseId', 'unique' => 0)
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
			'Case_CaseId' => 1,
			'Defendant_DefendantId' => 1
		),
	);

}
