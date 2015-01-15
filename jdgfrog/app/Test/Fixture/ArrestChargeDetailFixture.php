<?php
/**
 * ArrestChargeDetailFixture
 *
 */
class ArrestChargeDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ACDId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'ChargeDate' => array('type' => 'date', 'null' => false, 'default' => null),
		'ArrestDate' => array('type' => 'date', 'null' => false, 'default' => null),
		'Detained' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'Role' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'LaborTraf' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'AdultSexTraf' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'MinorSexTraf' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'Fel_C' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Fel_S' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'BailType' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'BailAmount' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'CHD_CaseId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'CHD_DefendantId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('ACDId', 'CHD_CaseId', 'CHD_DefendantId'), 'unique' => 1),
			'Id_UNIQUE' => array('column' => 'ACDId', 'unique' => 1),
			'fk_arrest_charge_details_cases_has_defendants1_idx' => array('column' => array('CHD_CaseId', 'CHD_DefendantId'), 'unique' => 0)
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
			'ACDId' => 1,
			'ChargeDate' => '2015-01-15',
			'ArrestDate' => '2015-01-15',
			'Detained' => 1,
			'Role' => 1,
			'LaborTraf' => 1,
			'AdultSexTraf' => 1,
			'MinorSexTraf' => 1,
			'Fel_C' => 1,
			'Fel_S' => 1,
			'BailType' => 1,
			'BailAmount' => 1,
			'CHD_CaseId' => 1,
			'CHD_DefendantId' => 1
		),
	);

}
