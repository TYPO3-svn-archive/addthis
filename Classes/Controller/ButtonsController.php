<?php

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Controller with generate the buttons
 *
 * @package addthis
 */
class Tx_Addthis_Controller_ButtonsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	/**
	 * Generate the Addthis Code
	 */
	public function indexAction(){
		$config = $this->getConfig();

        $codeGenerator = new Tx_Addthis_CodeGenerator($config);
		$this->view->assign('html',$codeGenerator->getHtmlCode());
		$this->view->assign('config',$codeGenerator->getConfigJs());
		$this->view->assign('urlDomIsNotReady',$codeGenerator->getJsImport(FALSE));
		$this->view->assign('urlDomIsReady',$codeGenerator->getJsImport(TRUE));
		$this->view->assign('label',$this->settings['label']);
		if ($this->isAjaxRequest()) {
			$this->view->assign('ajaxcontext', 'TRUE');
		}
		$metatags = new Tx_Addthis_Metatags($config);
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
		$isTwoClick = FALSE;
		if (FALSE !== strpos(base64_decode($this->settings['style']), 'socialshareprivacy')){
			$this->include2ClickResources();
			$isTwoClick = TRUE;
		}
		$this->view->assign('isTwoClick',$isTwoClick);
	}

	/**
	 * Tells if the current request is an AJAX request.
	 *
	 * @return boolean
	 */
	private function isAjaxRequest() {
		return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 'xmlhttprequest' === strtolower($_SERVER['HTTP_X_REQUESTED_WITH']));
	}

	/**
	 * @return void
	 */
	private function include2ClickResources() {
        $path = ExtensionManagementUtility::siteRelPath('addthis');
		$GLOBALS ['TSFE']->getPageRenderer ()->addCssFile($path . 'Resources/Public/Css/socialshareprivacy.css');
		$GLOBALS ['TSFE']->getPageRenderer ()->addCssFile($path . 'Resources/Public/Css/2Click.css');
		$GLOBALS ['TSFE']->getPageRenderer ()->addJsFooterLibrary('addthis2click', $path . 'Resources/Public/Js/jquery.socialshareprivacy.js');
		$GLOBALS ['TSFE']->getPageRenderer ()->addJsFooterLibrary('addthis2click_init', $path . 'Resources/Public/Js/socialshareprivacy.js');
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
