<?php
require_once dirname ( __FILE__ ) . '/../CodeGenerator.php';
require_once dirname ( __FILE__ ) . '/../Config.php';
/**
 * Controller with generate the buttons
 *
 * @package addthis
 */
class Tx_Addthis_Controller_ButtonsController extends Tx_Extbase_MVC_Controller_ActionController {
	/**
	 * Generate the Addthis Code
	 */
	public function indexAction(){
		$codeGenerator = new Tx_Addthis_CodeGenerator($this->getConfig());
		$this->view->assign('html',$codeGenerator->getHtmlCode());
		$this->view->assign('config',$codeGenerator->getConfigJs());
		$this->view->assign('url',$codeGenerator->getJsImport());
		$this->view->assign('label',$this->settings['label']);
	}
	/**
	 * @return Tx_Addthis_Config
	 */
	private function getConfig(){
		$config = new Tx_Addthis_Config();
		$config->setSettings($this->settings);
		$extConfig = unserialize ( $GLOBALS ['TYPO3_CONF_VARS'] ['EXT'] ['extConf'] ['addthis'] );
		if(is_array($extConfig) && isset($extConfig['username']) &&  !empty($extConfig['username'])) {
			$config->setUsername($extConfig['username']);
		}
		return $config;
	}
}
