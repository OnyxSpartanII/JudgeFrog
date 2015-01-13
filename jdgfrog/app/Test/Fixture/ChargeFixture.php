<?php
/**
 * ChargeFixture
 *
 */
class ChargeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ChargeId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Counts' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'CountsNolleProssed' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Statute' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'PleaDismissed' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'PleaGuilty' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'TrialGuilty' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'TrialNotGuilty' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Fines' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Sentence' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Probation' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'arrest_charge_details_ACDId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('ChargeId', 'arrest_charge_details_ACDId'), 'unique' => 1),
			'ChargeId_UNIQUE' => array('column' => 'ChargeId', 'unique' => 1),
			'fk_charges_arrest_charge_details1_idx' => array('column' => 'arrest_charge_details_ACDId', 'unique' => 0)
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
			'ChargeId' => 1,
			'Counts' => 1,
			'CountsNolleProssed' => 1,
			'Statute' => 'Lorem ipsum dolor sit amet',
			'PleaDismissed' => 1,
			'PleaGuilty' => 1,
			'TrialGuilty' => 1,
			'TrialNotGuilty' => 1,
			'Fines' => 1,
			'Sentence' => 1,
			'Probation' => 1,
			'arrest_charge_details_ACDId' => 1
		),
	);

}
