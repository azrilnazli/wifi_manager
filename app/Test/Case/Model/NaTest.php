<?php
App::uses('Na', 'Model');

/**
 * Na Test Case
 */
class NaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.na'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Na = ClassRegistry::init('Na');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Na);

		parent::tearDown();
	}

}
