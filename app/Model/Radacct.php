<?php
App::uses('AppModel', 'Model');
/**
 * Radacct Model
 *
 */
class Radacct extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'radacct';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'radacctid';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

}
