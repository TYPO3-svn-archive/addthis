<?php
/**
 * Value object for the addthis config
 * @package addthis
 */
class Tx_Addthis_Config {
	const DOCTYPE_XHTML = 1;
    const DOCTYPE_HTML = 2;

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
	 * @var string
	 */
	private $httpSheme = 'http://';
	/**
	 * @var string
	 */
	private $httpsSheme = 'https://';
    /**
     * @var integer
     */
    private $doctype;
	/**
	 * Set the username
	 */
	public function __construct(){
		$extConfig = unserialize ( $GLOBALS ['TYPO3_CONF_VARS'] ['EXT'] ['extConf'] ['addthis'] );
		if(is_array($extConfig) && isset($extConfig['username']) &&  !empty($extConfig['username'])) {
			$this->setUsername($extConfig['username']);
		}
		if(is_array($extConfig) && isset($extConfig['http_sheme']) &&  !empty($extConfig['http_sheme'])) {
			$this->setHttpSheme($extConfig['http_sheme']);
		}
		if(is_array($extConfig) && isset($extConfig['https_sheme']) &&  !empty($extConfig['https_sheme'])) {
			$this->setHttpsSheme($extConfig['https_sheme']);
		}

        $this->setDoctype($this->getDoctypeConfig());
	}
	/**
	 * @param array $settings
	 */
	public function setSettings(array $settings = array() ){
		$booleans = array('ui_click','ui_use_css','data_track_clickback');
		
		$config_keys = array();
		$config_keys[] = 'data_track_clickback';
		$config_keys[] = 'ui_language';
		$config_keys[] = 'ui_cobrand';
		$config_keys[] = 'services_exclude';
		$config_keys[] = 'services_compact';
		$config_keys[] = 'services_exclude';
		$config_keys[] = 'ui_click';
		$config_keys[] = 'ui_delay';
		$config_keys[] = 'ui_use_css';
		$config_keys[] = 'ui_offset_top';
		$config_keys[] = 'ui_offset_left';
		$config_keys[] = 'ui_header_color';
		$config_keys[] = 'ui_header_background';
		$config_keys[] = 'ui_cobrand';
		
		
		
		foreach($settings as $key =>$value){
			if(in_array($key,$config_keys) && $value!==''){
				if(in_array($key,$booleans)){
					$value = (boolean)$value;
				}
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
	 * @return string $jsConfig
	 */
	public function getJsConfig() {
		return $this->jsConfig;
	}

	/**
	 * @return string $username
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
	/**
	 * @return string $httpSheme
	 */
	public function getHttpSheme() {
		return $this->httpSheme;
	}

	/**
	 * @return string $httpsSheme
	 */
	public function getHttpsSheme() {
		return $this->httpsSheme;
	}

	/**
	 * @param string $httpSheme the $httpSheme to set
	 */
	public function setHttpSheme($httpSheme) {
		$this->httpSheme = $httpSheme;
	}

	/**
	 * @param string $httpsSheme the $httpsSheme to set
	 */
	public function setHttpsSheme($httpsSheme) {
		$this->httpsSheme = $httpsSheme;
	}

    /**
     * @param integer $doctype
     */
    public function setDoctype($doctype) {
        $this->doctype = $doctype;
    }

    /**
     * @return integer
     */
    public function getDoctype() {
        return $this->doctype;
    }

    /**
     * @return string
     * @see http://docs.typo3.org/typo3cms/TyposcriptReference/Setup/Config/Index.html#doctype
     */
    private function getDoctypeConfig() {
        if (false === isset($GLOBALS['TSFE']->config['config']['doctype'])) {
            return self::DOCTYPE_HTML;
        }

        $doctype = $GLOBALS['TSFE']->config['config']['doctype'];

        if (false !== strpos($doctype, 'xhtml')) {
            return self::DOCTYPE_XHTML;
        }
        else {
            return self::DOCTYPE_HTML;
        }
    }
}