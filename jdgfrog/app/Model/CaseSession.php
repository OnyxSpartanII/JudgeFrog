<?php
App::uses('AppModel', 'Model');
/**
 * CaseSession Model
 *
 */
class CaseSession extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'session_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'author' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'current_step' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CaseDefId' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				// 'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
/** Session 1 **/
		'CaseNam' => array(
			'alphaNumeric' => array(
                'rule' => '/[a-zA-Z0-9 ,.\-]+/',
                'required' => true,
                'message' => 'Required'
            ),
		),
		'CaseNum' => array(
			'alphaNumeric' => array(
                'rule' => '/[a-zA-Z0-9:\-,.]+/',
                'required' => true,
                'message' => 'Required'
            ),
		),
		'NumDef' => array(
			'numeric' => array(
				'rule' => array('numeric','required'),
				'message' => 'Required. Please Enter A Number In Number Format'
			),
		),
/** Session 2 **/
		'NumVic' => array(
			// 'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		),
		'NumVicMinor' => array(
			// 'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		),
		'NumVicForeign' => array(
			// 'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		),
		'NumVicFemale' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
/** Session 3 **/
		'DefBirthdate' => array(
			'numeric' => array(
				'rule' => '^\d{4}$^',
				'message' => 'Please Enter A Four Digit Year In Numeric Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
			),
		'DefArrestAge' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Please Enter A Valid Age In Numeric Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
			),
/** Session 4 **/
		'ChargeDate' => array(
			//'numeric' => array(
				'rule' => '/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/',
				'message' => 'Please Enter A Date In 3/15/2015 Format',
				'allowEmpty' => true,//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		),
		'ArrestDate' => array(
			//'numeric' => array(
				'rule' => '/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/',
				'message' => 'Please Enter A Date In 3/15/2015 Format',
				'allowEmpty' => true,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
		'BailAmount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				// 'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'FelCharged' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				// 'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'FelSentenced' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				// 'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
/** Session 5 **/
		'Counts1961to1968' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1961to1968' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1961to1968' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1961to1968' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1961to1968' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1961to1968' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1961to1968' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1961to1968' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob1961to1968' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts1028' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1028' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1028' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1028' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1028' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1028' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1028' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1028' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts1351' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1351' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1351' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1351' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1351' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1351' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1351' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1351' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob1351' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts1425' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1425' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1425' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1425' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1425' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1425' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1425' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1425' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob1425' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts1512' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1512' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1512' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1512' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1512' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1512' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1512' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1512' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob1512' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts1546' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1546' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1546' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1546' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1546' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1546' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1546' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1546' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob1546' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts1581to1588' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1581to1588' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1581to1588' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1581to1588' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1581to1588' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1581to1588' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1581to1588' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1581to1588' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob1581to1588' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts1589' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1589' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1589' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1589' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1589' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1589' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1589' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1589' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob1589' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts1590' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1590' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1590' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1590' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1590' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1590' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1590' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1590' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob1590' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts1591' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1591' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1591' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1591' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1591' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1591' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1591' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1591' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob1591' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts1592' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1592' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1592' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1592' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1592' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1592' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1592' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1592' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob1592' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts2252' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP2252' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed2252' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty2252' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty2252' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG2252' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines2252' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent2252' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob2252' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts2260' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP2260' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed2260' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty2260' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty2260' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG2260' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines2260' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent2260' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob2260' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts2421to2424' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP2421to2424' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed2421to2424' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty2421to2424' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty2421to2424' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG2421to2424' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines2421to2424' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent2421to2424' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob2421to2424' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts1324' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1324' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1324' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1324' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1324' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1324' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1324' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1324' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob1324' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Counts1328' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'CountsNP1328' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaDismissed1328' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'PleaGuilty1328' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialGuilty1328' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'TrialNG1328' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fines1328' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Sent1328' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Prob1328' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
/** Session 6 **/		
		'DateTerm' => array(
				//'numeric' => array(
					'rule' => '/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/',
					'message' => 'Please Enter A Date In 3/15/1987 Format',
					'allowEmpty' => true,
					//'allowEmpty' => false,
					// 'required' => true,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				//),
			),
		'SentDate' => array(
				// 'numeric' => array(
					'rule' => '/(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d/',
					'message' => 'Please Enter A Date In 3/15/1987 Format',
					'allowEmpty' => true,

					//'allowEmpty' => false,
					// 'required' => true,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				// ),
			),
		'TotalSentence' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Restitution' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'SupRelease' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Probation' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please Enter A Number In Number Format',
				'allowEmpty' => true,
				//'allowEmpty' => false,
				// 'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);




	/** 
	*	This method retrieves the current largest session ID from currently stored sessions.
	*	
	*
	*
	*
	*/
	public function getMaxSessionId() {
		
	}
}
