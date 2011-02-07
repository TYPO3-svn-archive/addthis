<?php
/**
 * Value object for the addthis config
 * @package addthis
 */
class Tx_Addthis_Config {
	/**
	 * @var array
	 */
	private $jsConfig = array();
	/**
	 * @var array
	 */
	private $jsShare = array();
	/** 
	 * account name
	 * @var string 
	 */
	private $username;
	/**
	 * @var string
	 */
	private $style;
	/**
	 * @param array $settings
	 */
	public function setSettings(array $settings = array() ){
		$config_keys = array();
		$config_keys[] = 'data_track_clickback';
		$config_keys[] = 'ui_language';
		$config_keys[] = 'ui_cobrand';
		$config_keys[] = 'services_exclude';
		$config_keys[] = 'services_compact';
		$config_keys[] = 'services_exclude';
		$config_keys[] = 'ui_click';
		$config_keys[] = 'ui_delay';
		$config_keys[] = 'ui_offset_top';
		$config_keys[] = 'ui_offset_left';
		$config_keys[] = 'ui_header_color';
		$config_keys[] = 'ui_header_background';
		$config_keys[] = 'ui_cobrand';
		foreach($settings as $key =>$value){
			if(in_array($key,$config_keys) && !empty($value)){
				$this->jsConfig[$key] = $value;
			}
		}
		$share_keys = array();
		$share_keys[] = 'url';
		$share_keys[] = 'title';
		$share_keys[] = 'description';
		$share_keys[] = 'swfurl';
		$share_keys[] = 'width';
		$share_keys[] = 'height';
		$share_keys[] = 'email_template';
		foreach($settings as $key =>$value){
			if(in_array($key,$share_keys) && !empty($value)){
				$this->jsShare[$key] = $value;
			}
		}
		
		if(isset($settings['style'])){
			$this->setStyle(base64_decode($settings['style']));
		}
	}
	/**
	 * @return the $jsConfig
	 */
	public function getJsConfig() {
		return $this->jsConfig;
	}

	/**
	 * @return the $username
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @param string $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}
	/**
	 * @return array $style
	 */
	public function getStyle() {
		return $this->style;
	}

	/**
	 * @param string $style
	 */
	public function setStyle($style) {
		$this->style = $style;
	}
	/**
	 * @return array $jsShare
	 */
	public function getJsShare() {
		return $this->jsShare;
	}




	
}