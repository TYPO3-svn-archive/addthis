<?php
require_once dirname ( __FILE__ ) . '/../Classes/CodeGenerator.php';
require_once dirname ( __FILE__ ) . '/../Classes/Config.php';
/**
 * test case for Tx_Addthis_CodeGenerator
 * 
 * @package addthis
 */
class Tx_AddThis_CodeGeneratorTest extends tx_phpunit_testcase {
	/**
	 * 
	 * @var Tx_Addthis_CodeGenerator
	 */
	private $codeGenerator;
	/**
	 * 
	 * @var Tx_Addthis_Config
	 */
	private $config;
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		$this->config = new Tx_Addthis_Config ();
		$this->codeGenerator = new Tx_Addthis_CodeGenerator ( $this->config );
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		unset ( $this->codeGenerator );
		unset ( $this->config );
	}
	/**
	 * test method getConfigJs
	 * @test
	 */
	public function getConfigJs() {
		$this->config->setUsername ( 'test' );
		$this->config->setSettings ( array ('data_track_clickback' => true,'url' => 'www' ) );
		$code = $this->codeGenerator->getConfigJs ();
		$this->assertContains ( '{"data_track_clickback":true', $code );
		$this->assertContains ( 'test', $code );
		$this->assertContains ( 'var addthis_config', $code );
		$this->assertContains ( 'var addthis_share', $code );
	}

	/**
	 * test method createJsImport
	 * @test
	 */
	public function getJsImport() {
		$code = $this->codeGenerator->getJsImport ();
		$this->assertContains ( 'addthis_widget.js', $code );
	}
	/**
	 * test method getHtmlCode
	 * @test
	 */
	public function getHtmlCode() {
		$this->config->setUsername ( 'test' );
		$this->config->setSettings ( array ('style' => base64_encode ( '<div>###USERNAME###</div>' ) ) );
		$code = $this->codeGenerator->getHtmlCode ();
		$this->assertContains ( '<div>test</div>', $code );
	}
}

