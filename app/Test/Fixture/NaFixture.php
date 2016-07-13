<?php
/**
 * Na Fixture
 */
class NaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'nasname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'shortname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 32, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'type' => array('type' => 'string', 'null' => true, 'default' => 'other', 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ports' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5, 'unsigned' => false),
		'secret' => array('type' => 'string', 'null' => false, 'default' => 'secret', 'length' => 60, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'server' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'community' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => true, 'default' => 'RADIUS Client', 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'nasname' => array('column' => 'nasname', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'nasname' => 'Lorem ipsum dolor sit amet',
			'shortname' => 'Lorem ipsum dolor sit amet',
			'type' => 'Lorem ipsum dolor sit amet',
			'ports' => 1,
			'secret' => 'Lorem ipsum dolor sit amet',
			'server' => 'Lorem ipsum dolor sit amet',
			'community' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
	);

}
