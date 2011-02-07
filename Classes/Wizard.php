<?php
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
		global $LANG;
		$LL = $this->includeLocalLang ();
		$wizardItems ['plugins_tx_addthis_pi1'] = array ('icon' => t3lib_extMgm::extRelPath ( 'addthis' ) . 'Resources/Public/Images/ce_wiz.gif', 'title' => $LANG->getLLL ( 'pi1_title', $LL ), 'description' => $LANG->getLLL ( 'pi1_plus_wiz_description', $LL ), 'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=addthis_pi1' );
		return $wizardItems;
	}
	
	/**
	 * Reads the [extDir]/locallang.xml and returns the $LOCAL_LANG array found in that file.
	 *
	 * @return	The array with language labels
	 */
	private function includeLocalLang() {
		$llFile = t3lib_extMgm::extPath ( 'addthis' ) . 'Resources/Private/Language/locallang.xml';
		$LOCAL_LANG = t3lib_div::readLLXMLfile ( $llFile, $GLOBALS ['LANG']->lang );
		return $LOCAL_LANG;
	}
}