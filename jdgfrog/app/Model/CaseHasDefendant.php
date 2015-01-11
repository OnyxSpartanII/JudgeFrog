<?php
App::uses('AppModel', 'Model');
/**
 * CaseHasDefendant Model
 *
 */
class CaseHasDefendant extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'case_has_defendant';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'Case_CaseId';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'Case_CaseId' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Defendant_DefendantId' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
