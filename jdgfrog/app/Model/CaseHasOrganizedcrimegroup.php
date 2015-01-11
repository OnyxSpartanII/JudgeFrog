<?php
App::uses('AppModel', 'Model');
/**
 * CaseHasOrganizedcrimegroup Model
 *
 */
class CaseHasOrganizedcrimegroup extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'case_has_organizedcrimegroup';

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
		'OrganizedCrimeGroup_OCGId' => array(
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
