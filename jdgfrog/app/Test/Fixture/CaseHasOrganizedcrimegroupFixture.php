<?php
/**
 * CaseHasOrganizedcrimegroupFixture
 *
 */
class CaseHasOrganizedcrimegroupFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'case_has_organizedcrimegroup';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'Case_CaseId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'OrganizedCrimeGroup_OCGId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('Case_CaseId', 'OrganizedCrimeGroup_OCGId'), 'unique' => 1),
			'fk_Case_has_OrganizedCrimeGroup_OrganizedCrimeGroup1_idx' => array('column' => 'OrganizedCrimeGroup_OCGId', 'unique' => 0),
			'fk_Case_has_OrganizedCrimeGroup_Case1_idx' => array('column' => 'Case_CaseId', 'unique' => 0)
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
			'OrganizedCrimeGroup_OCGId' => 1
		),
	);

}
