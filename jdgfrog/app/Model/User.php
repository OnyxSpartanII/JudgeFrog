<?php

App::uses('AppModel', 'Model', 'AuthComponent');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'Username';


/**
 * Validation rules
 *
 * @var array
 */

	public $validate = array(
	'username' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'Please enter a username.'
					),
				//'unique' => array(
				//	'rule' => array('isUniqueUsername'),
				//	'message' => 'Username already in use.'
				//	),

		),
	'password' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'A password is required.'
					),
				'min_length' => array(
					'rule' => array('minLength', '6'),
					'message' => 'Password must be a minimum of 6 characters.'
					)
		),
	'password_confirm' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'Please confirm your password.'
					),
				'equalToField' => array(
					'rule' => array('equalToField', 'password'),
					'message' => 'Passwords must match.'
					)

		),

	//check yo privilege (level)
	//Rework this part. Need to allow for setting of privileges by root user. Maybe auth using a one-time code?
	'role' => array(
				'required' => array(
					'rule' => array('inList', array('admin', 'power_user')),
					'message' => 'User privilege level must be set.'
					)

		),

	'firstname' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'Please enter a first name'
					)

		),
	'lastname' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'Please enter a last name'
					)

		),

	'email' => array(
				'required' => array(
					'rule' => 'notEmpty',
					'message' => 'Please enter a valid email.'
					),
				'email' => array(
					'rule' => 'email',
					'message' => 'A valid email address is required.'
					)
		)
	);


/*	function isUniqueUsername($check) {

		$username = $this->find(
			'first', array(
				'fields' => array('User.UserId', 'User.Username'), 
				'conditions' => array('User.username' => $check['Username'])
				)
			);

		if (!empty($username)) 
		{
			if ($this->data[$this->alias]['id'] == $username['User']['id']) 
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		else 
		{
			return false;
		}
	}*/

	public function equalToField($field1, $field2) {
		//checks if a field is equal to another field.

		$fname = '';
		foreach($field1 as $key => $value) {
			$fname = $key;
			break;
		}
		return $this->data[$this->name][$field2] === $this->data[$this->name][$fname];
	}

	public function beforeSave($options = array()) {

		if (isset($this->data[$this->alias]['password'])) 
		{
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}
}