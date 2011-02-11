<?php
require_once dirname ( __FILE__ ) . '/../Classes/ConfigReader.php';
/**
 * test case for Tx_Addthis_ConfigReader
 * @package addthis
 */
class Tx_AddThis_ConfigReaderTest extends tx_phpunit_testcase {
	/**
	 * 
	 * @var Tx_Addthis_ConfigReader
	 */
	private $configReader;
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		$this->configReader = new Tx_Addthis_ConfigReader ();
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		unset ( $this->configReader );
	}
	/**
	 * test method languages
	 * @test
	 */
	public function languages() {
		$params = array ();
		$this->configReader->languages ( $params );
		$this->assertFalse ( empty($params) );
	}
	/**
	 * test method services
	 * @test
	 */
	public function services() {
		$params = array ();
		$this->configReader->services ( $params );
		$this->assertFalse ( empty($params) );
	}
/**
	 * test method styles
	 * @test
	 */
	public function styles() {
		$params = array ();
		$this->configReader->styles ( $params );
		$this->assertFalse ( empty($params) );
	}
}

