<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'AddThis'
);

$TCA['tt_content']['types']['list']['subtypes_excludelist']['addthis_pi1'] = 'layout,recursive,select_key,pages';
$TCA['tt_content']['types']['list']['subtypes_addlist']['addthis_pi1'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue( 'addthis_pi1', 'FILE:EXT:addthis/Configuration/FlexForms/Buttons.xml');

if (TYPO3_MODE=="BE"){
	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_Addthis_Wizard"] = t3lib_extMgm::extPath($_EXTKEY).'Classes/Wizard.php';
}
