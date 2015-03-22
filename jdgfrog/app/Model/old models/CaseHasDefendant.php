<?php
App::uses('AppModel', 'Model');
/**
 * CaseHasDefendant Model
 *
 */
class CaseHasDefendant extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'CaseId' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'DefendantId' => array(
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
