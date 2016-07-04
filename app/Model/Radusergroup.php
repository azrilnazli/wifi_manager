<?php
App::uses('AppModel', 'Model');
/**
 * Radusergroup Model
 *
 */
class Radusergroup extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'radusergroup';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'username';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

}
