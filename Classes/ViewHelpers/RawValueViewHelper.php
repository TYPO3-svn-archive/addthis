<?php
/**
 * render the raw value
 * @package addthis
 */
class Tx_Addthis_ViewHelpers_RawValueViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
	 * @param string $value
	 * @return string raw value
	 */
	public function render($value) {
		return $value;
	}
}