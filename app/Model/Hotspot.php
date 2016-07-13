<?php
App::uses('AppModel', 'Model');
/**
 * Hotspot Model
 *
 * @property User $User
 */
class Hotspot extends AppModel {

/*
    public $hasMany = array(
        'Radcheck' => array(
            'className' => 'Radcheck',
            'foreignKey' => FALSE,
            'conditions' => 'Radcheck.username=Hotspot.username',
            'fields' => '',
            'order' => '',
            'dependent' => true
        ),
    );

 */

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
        ),
        'Package'
	);

    public $validate = array(

        'username' => array(

            'alphaNumeric' => array(
                'rule'     => 'alphaNumeric',
                //'required' => true,
                //'last'      => true,
                'allowEmpty' => false,
                'message'  => 'Alphabets and numbers only'
            ),
            'between' => array(
                'rule'    => array('between', 5, 15),
                'message' => 'Between 4 to 15 characters'
            ),
            'isUnique' => array(
                'rule'    => 'isUnique',
                'message' => 'This username has already been taken.'
            )
        ),

      'number_of_tickets' => array(

            'numeric' => array(
                'rule'     => 'numeric',
                'allowEmpty' => false,
                'message'  => 'Numbers only'
            ),
        ),

      'concurrent' => array(

            'numeric' => array(
                'rule'     => 'numeric',
                'allowEmpty' => false,
                'message'  => 'Numbers only'
            ),
        ),




        'password' => array(
            'required' => array(
                'on' => 'create',
                'rule' => array('notBlank'),
                'message' => 'A password is required'
            ),
            'between' => array(
                'rule'    => array('between', 4, 15),
                'message' => 'Between 4 to 15 characters'
            ),
         ),
    );
}
