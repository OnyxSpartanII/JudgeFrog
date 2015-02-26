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


public function beforeValidate($options = []) {
	$statutes = ['1961to1968', '1028', '1351', '1425', '1426',
				'1461to1465', '1512', '1542to1543', '1546',
				'1581to1588', '1589', '1590', '1591', '1592',
				'2251', '2252', '2260', '2421to2424', '1324',
				'1328'];
	$fields = ['Counts', 'CountsNP', 'PleaDismissed', 'PleaGuilty',
				'TrialGuilty', 'TrialNG', 'Fines', 'Sent', 'Prob'];

	foreach ($statutes as $statute) {
		$this->validate[$statute]['number'] = array(
			'rule' => array('inList', array(0,1)),
			'allowEmpty' => true,
			'message' => $statute . ' field must be either 0 or 1.'
		);
		foreach ($fields as $field) {
			$this->validate[$field . $statute]['number'] = array(
				'rule' => array('numeric'),
				'message' => $field . $statute . ' must be numeric.',
				'allowEmpty' => true
			);
		}	
	}
}

/**
 * Validation fields
 *
 * @var array [array of validation criterion]
 */
	public $validate = array(
		'NumDef' => array(
			'rule' => 'numeric',
			'message' => 'Incorrect value for Number of Defendants'
		),
		'State' => array(
			'rule' => '/[A-Z]{2}/i',
			'message' => 'Incorrect value for State',
			'allowEmpty' => true
		),
		'FedDistrictNum' => array(
			'rule' => array('numeric'),
			'message' => 'Incorrect value for Federal District Number',
			'allowEmpty' => true
		),
		'JudgeRace' => array(
			'inRange' => array(
				'rule' => array("inList", array(0,1,2,3,4,5)),
				'message' => 'Incorrect number for Judge Race',
				'allowEmpty' => true
			)
		),
		'JudgeGen' => array(
			'rule' => array('inList', array(0,1)),
			'message' => 'Incorrect value for Judge Gender',
			'allowEmpty' => true
		),
		'JudgeTenure' => array(
			'rule' => 'numeric',
			'message' => 'Incorrect value for Judge Tenure',
			'allowEmpty' => true
		),
		'JudgeApptBy' => array(
			'rule' => array('inList', array(0,1)),
			'message' => 'Incorrect value for Judge Appointed By',
			'allowEmpty' => true
		),
		'DefGen' => array(
			'rule' => array('inList', array(0,1)),
			'message' => 'Incorrect value for Defendant Gender',
			'allowEmpty' => true
		),
		'DefRace' => array(
			'rule' => array('inList', array(0,1,2,3,4,5)),
			'message' => 'Incorrect value for Defendant Race',
			'allowEmpty' => true
		),
		'DefBirthdate' => array(
			'rule' => '/(\d{1,2}\/\d{1,2}\/\d{4}|\d{4})/',
			'message' => 'Incorrect value for Defendant Birthdate',
			'allowEmpty' => true
		),
		'DefArrestAge' => array(
			'rule' => array('numeric'),
			'message' => 'Incorrect value for Defendant Arrest Age',
			'allowEmpty' => true
		),
		'ChargeDate' => array(
			'rule' => '/(\d{1,2}\/\d{1,2}\/\d{4}|\d{4})/',
			'message' => 'Incorrect value for Charge Date',
			'allowEmpty' => true,
		),
		'ArrestDate' => array(
			'rule' => '/(\d{1,2}\/\d{1,2}\/\d{4}|\d{4})/',
			'message' => 'Incorrect value for Arrest Date',
			'allowEmpty' => true
		),
		'Detained' => array(
			'rule' => array('inList', array(0,1)),
			'message' => 'Incorrect value for Detained',
			'allowEmpty' => true
		),
		'BailType' => array(
			'rule' => array('inList', array(0,1,2)),
			'message' => 'Incorrect value for Bail Type',
			'allowEmpty' => true
		),
		'BailAmount' => array(
			'rule' => array('numeric'),
			'message' => 'Incorrect value for Bail Amount',
			'allowEmpty' => true
		),
		'LaborTraf' => array(
			'rule' => array('inList', array(0,1)),
			'message' => 'Incorrect value for Labor Trafficking',
			'allowEmpty' => true
		),
		'AdultSexTraf' => array(
			'rule' => array('inList', array(0,1)),
			'message' => 'Incorrect value for Adult Sex Trafficking',
			'allowEmpty' => true
		),
		'MinorSexTraf' => array(
			'rule' => array('inList', array(0,1)),
			'message' => 'Incorrect value for Minor Sex Trafficking',
			'allowEmpty' => true
		),
		'Role' => array(
			'rule' => array('inList', array(0,1)),
			'message' => 'Incorrect value for Role',
			'allowEmpty' => true
		),
		'FelCharged' => array(
			'rule' => array('numeric'),
			'message' => 'Incorrect value for Felonies Charged',
			'allowEmpty' => true
		),
		'FelSentenced' => array(
			'rule' => array('numeric'),
			'message' => 'Incorrect value for Felonies Sentenced',
			'allowEmpty' => true
		)
	);

}
