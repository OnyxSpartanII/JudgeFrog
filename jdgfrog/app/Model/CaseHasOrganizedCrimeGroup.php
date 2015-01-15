<?php
App::uses('AppModel', 'Model');
/**
 * CaseHasOrganizedCrimeGroup Model
 *
 */
class CaseHasOrganizedCrimeGroup extends AppModel {

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
