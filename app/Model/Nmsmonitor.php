<?php
App::uses('AppModel', 'Model');
/**
 * Nmsmonitor Model
 *
 * @property User $User
 */
class Nmsmonitor extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'nmsmonitor';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'device';

    public $validate = array(
        'deviceip' => array(
            'ip' => array(
                'rule' => array('ip'),
                'message' => 'Please provide correct IP Address',
                'allowEmpty' => false,
                'required' => true,
                'last' => false, // Stop validation after this rule
                'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

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
	);
   public $hasOne = array(
        'Snmpmrtg' => array(
            'className' => 'Snmpmrtg',
            'foreignKey' => 'nmsmonitor_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'dependent'=> true,
        ),
    );
}
