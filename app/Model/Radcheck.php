<?php
App::uses('AppModel', 'Model');
/**
 * Radcheck Model
 *
 */
class Radcheck extends AppModel {

    public $belongsTo = array(
        'Hotspot' => array(
            'className' => 'Hotspot',
            'foreignKey' => FALSE,
            'conditions' => 'Hotspot.username=Radcheck.username',
            'fields' => '',
            'order' => ''
        )
    );

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'radcheck';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

}
