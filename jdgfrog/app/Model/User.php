<?php

App::uses('AppModel', 'Model', 'AuthComponent');

class User extends AppModel {
	public $validate = array(
	'username' => array(
				'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'A username is required'
							)
					),
	'password' => array (
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'A password is required.'
					)
		),
	'password_confirm' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'Password must have a salt.'
					)

		),

	//check yo privilege (level)
	//Rework this part. Need to allow for setting of privileges by root user. Maybe auth using a one-time code?
	'privilege' => array(
				'required' => array(
					'rule' => array('inList', array('admin', 'power_user')),
					'message' => 'User privilege level must be set.'
					)

		),
	'email' => array(
				'required' => array(
					'rule' => array('email', true)
					)
		)
	);

}