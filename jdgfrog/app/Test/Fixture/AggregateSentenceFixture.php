<?php
/**
 * AggregateSentenceFixture
 *
 */
class AggregateSentenceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'SentenceId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'DateTerminated' => array('type' => 'date', 'null' => false, 'default' => null),
		'Date' => array('type' => 'date', 'null' => false, 'default' => null),
		'Total' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Restitution' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'AssetForfeit' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'Appeal' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'SupervisedRelease' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Probation' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'CHD_CaseId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'CHD_DefendantId' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('SentenceId', 'CHD_CaseId', 'CHD_DefendantId'), 'unique' => 1),
			'SentenceId_UNIQUE' => array('column' => 'SentenceId', 'unique' => 1),
			'fk_aggregate_sentences_cases_has_defendants1_idx' => array('column' => array('CHD_CaseId', 'CHD_DefendantId'), 'unique' => 0)
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
			'SentenceId' => 1,
			'DateTerminated' => '2015-01-15',
			'Date' => '2015-01-15',
			'Total' => 1,
			'Restitution' => 1,
			'AssetForfeit' => 1,
			'Appeal' => 1,
			'SupervisedRelease' => 1,
			'Probation' => 1,
			'CHD_CaseId' => 1,
			'CHD_DefendantId' => 1
		),
	);

}
