<?php
if (!defined ('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'AddThis'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['addthis_pi1'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['addthis_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue( 'addthis_pi1', 'FILE:EXT:addthis/Configuration/FlexForms/Buttons.xml');

if (TYPO3_MODE=="BE"){
    $GLOBALS['TBE_MODULES_EXT']['xMOD_db_new_content_el']['addElClasses']['tx_Addthis_Wizard'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'Classes/Wizard.php';
}
