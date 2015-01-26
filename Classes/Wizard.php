<?php

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Add the plugin to wizzard
 * @package addthis
 */
class tx_Addthis_Wizard {

	/**
	 * Processing the wizard items array
	 *
	 * @param	array $wizardItems The wizard items
	 * @return	Modified array with wizard items
	 */
	public function proc($wizardItems) {
		$LL = $this->includeLocalLang ();
		$wizardItems ['plugins_tx_addthis_pi1'] = array (
		  'icon' => ExtensionManagementUtility::extRelPath ( 'addthis' ) . 'Resources/Public/Images/ce_wiz.gif',
		  'title' => $GLOBALS['LANG']->getLLL ( 'pi1_title', $LL ),
		  'description' => $GLOBALS['LANG']->getLLL ( 'pi1_plus_wiz_description', $LL ),
		  'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=addthis_pi1' );
		return $wizardItems;
	}

	/**
	 * Reads the [extDir]/locallang.xml and returns the $LOCAL_LANG array found in that file.
	 *
	 * @return	The array with language labels
	 */
	private function includeLocalLang() {
		$llFile = ExtensionManagementUtility::extPath ( 'addthis' ) . 'Resources/Private/Language/locallang.xml';
        /* @var $l10nParser \TYPO3\CMS\Core\Localization\Parser\LocallangXmlParser */
        $l10nParser = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Localization\\Parser\\LocallangXmlParser');
        return $l10nParser->getParsedData($llFile, $GLOBALS['LANG']->lang);
	}
}