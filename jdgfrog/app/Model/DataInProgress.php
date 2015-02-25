<?php
App::uses('AppModel', 'Model');
/**
 * DataInProgress Model
 *
 */
class DataInProgress extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'DataInProgress';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'CaseDefId';

/**
 * Validation fields
 *
 * @var array [array of validation criterion]
 */
	public $validate = array(
		'NumDef' => array(
			'rule' => '/[0-9]+/',
			'message' => 'Incorrect value for Number of Defendants'
		),
		'State' => array(
			'rule' => '/[A-Z]{2}/i',
			'message' => 'Incorrect value for State'
		),
		'FedDistrictNum' => array(
			'rule' => array('range',1,13),
			'message' => 'Incorrect value for Federal District Number'
		),
		'JudgeRace' => array(
			'rule' => array("inList", array(1,2,3,4,5)),
			'message' => 'Incorrect value for Judge Race'
		),
		'JudgeGen' => array(
			'rule' => '/[01]{1}/',
			'message' => 'Incorrect value for Judge Gender'
		),
		'JudgeTenure' => array(
			'rule' => '/[0-9]{4}/',
			'message' => 'Incorrect value for Judge Tenure'
		),
		'JudgeApptBy' => array(
			'rule' => '/[01]{1}/',
			'message' => 'Incorrect value for Judge Appointed By'
		),
		'DefGen' => array(
			'rule' => '/[01]{1}/',
			'message' => 'Incorrect value for Defendant Gender'
		),
		'DefRace' => array(
			'rule' => '/[1-5]{2}/',
			'message' => 'Incorrect value for Defendant Race'
		),
		'DefBirthdate' => array(
			'rule' => '/[0-9]{4}/',
			'message' => 'Incorrect value for Defendant Birthdate'
		),
		'DefArrestAge' => array(
			'rule' => '/[0-9]{2}/',
			'message' => 'Incorrect value for Defendant Arrest Age'
		),
		'ChargeDate' => array(
			'rule' => '/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/',
			'message' => 'Incorrect value for Charge Date',
		),
		'ArrestDate' => array(
			'rule' => '/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/',
			'message' => 'Incorrect value for Arrest Date'
		),
		'Detained' => array(
			'rule' => '/[01]{1}/',
			'message' => 'Incorrect value for Detained'
		),
		'BailType' => array(
			'rule' => '/[012]{1}/',
			'message' => 'Incorrect value for Bail Type'
		),
		'BailAmount' => array(
			'rule' => '/[0-9]+/',
			'message' => 'Incorrect value for Bail Amount'
		),
		'LaborTraf' => array(
			'rule' => '/[01]{1}/',
			'message' => 'Incorrect value for Labor Trafficking'
		),
		'AdultSexTraf' => array(
			'rule' => '/[01]{1}/',
			'message' => 'Incorrect value for Adult Sex Trafficking'
		),
		'MinorSexTraf' => array(
			'rule' => '/[01]{1}/',
			'message' => 'Incorrect value for Minor Sex Trafficking'
		),
		'Role' => array(
			'rule' => '/[01]{1}/',
			'message' => 'Incorrect value for Role'
		),
		'FelCharged' => array(
			'rule' => '/[0-9]+/',
			'message' => 'Incorrect value for Felonies Charged'
		),
		'FelSentenced' => array(
			'rule' => '/[0-9]+/',
			'message' => 'Incorrect value for Felonies Sentenced'
		)
	);

}
