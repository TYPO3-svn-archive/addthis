<?php
/**
 * render the raw value
 * @package addthis
 */
class Tx_Addthis_ViewHelpers_RawValueViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	/**
	 * @param string $value
	 * @return string raw value
	 */
	public function render($value) {
		return $value;
	}
}