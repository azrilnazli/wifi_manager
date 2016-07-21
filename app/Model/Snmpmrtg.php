<?php
App::uses('AppModel', 'Model');
/**
 * Snmpmrtg Model
 *
 * @property User $User
 */
class Snmpmrtg extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'snmpmrtg';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'snmp_ip';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'snmp_ip' => array(
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
         'Nmsmonitor' => array(
            'className' => 'Nmsmonitor',
            'foreignKey' => 'nmsmonitor_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )

	);
}
