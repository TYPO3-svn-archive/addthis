<?php
/**
 * Generate the addthis code
 * @package addthis
 */
class Tx_Addthis_CodeGenerator {
	/**
	 * @var Tx_Addthis_Config
	 */
	private $config;
	/**
	 * @param Tx_Addthis_Config $config
	 */
	public function __construct(Tx_Addthis_Config $config) {
		$this->config = $config;
	}
	/**
	 * create the config object
	 * @return string
	 */
	public function getConfigJs() {
		$config =  $this->config->getJsConfig();
		$config['pubid'] = $this->config->getUsername();
		$code = '';
		if(!empty($config)){
			$code = 'var addthis_config = ' . json_encode ($config) . ';';
		}
		$config =  $this->config->getJsShare();
		if(!empty($config)){
			$code .= 'var addthis_share = ' . json_encode ($config) . ';';
		}
		return $code;
	}
	/**
	 * create the js import
	 * @return string
	 */
	public function getJsImport() {
		if (t3lib_div::getIndpEnv ( 'TYPO3_SSL' )) {
			$sheme = $this->config->getHttpsSheme();
		} else {
			$sheme = $this->config->getHttpSheme();
		}
		$url = $sheme.'s7.addthis.com/js/250/addthis_widget.js#domready=1';
		return $url;
	}
	/**
	 * create the html code
	 * @return string
	 */
	public function getHtmlCode(){
		return str_replace('###USERNAME###',$this->config->getUsername(),$this->config->getStyle());
	}
}
