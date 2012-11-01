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
		$this->view->assign('urlDomIsNotReady',$codeGenerator->getJsImport(FALSE));
		$this->view->assign('urlDomIsReady',$codeGenerator->getJsImport(TRUE));
		$this->view->assign('label',$this->settings['label']);
		
		$metatags = new Tx_Addthis_Metatags();
		if(isset($this->settings['image']) && !empty($this->settings['image'])){
			$baseUri = $this->request->getBaseURI ();
			$metatags->addThumbnail($this->settings['image'],$baseUri);
		}
		if(isset($this->settings['title']) && !empty($this->settings['title'])) {
			$metatags->addTitle($this->settings['title']);
		};
		
		if(isset($this->settings['description']) && !empty($this->settings['description'])) {
			$metatags->addDescription($this->settings['description']);
		};
		
	}
	/**
	 * @return Tx_Addthis_Config
	 */
	private function getConfig(){
		$config = new Tx_Addthis_Config();
		$config->setSettings($this->settings);
		return $config;
	}
}
