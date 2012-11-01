<?php
/**
 * Read the available config from csv File
 * @package addthis
 */
class tx_Addthis_ConfigReader {
	/**
	 * read services
	 * @param array &$params
	 */
	public function services(&$params ,&$p) {
		$file = t3lib_extMgm::extPath ( 'addthis' ) . '/Configuration/services.csv';
		$this->readCsv($params,$file);
	}
	/**
	 * read Languages
	 * @param array &$params
	 */
	public function languages(&$params,&$p) {
		$file = t3lib_extMgm::extPath ( 'addthis' ) . '/Configuration/languages.csv';
		$this->readCsv($params,$file);
	}
	/**
	 * read styles
	 * @param array &$params
	 */
	public function styles(&$params,&$p) {
		$ext_path = t3lib_extMgm::extPath ( 'addthis' ) ;
		
		$siteRelPath = t3lib_extMgm::siteRelPath ( 'addthis' );
		$file = $ext_path . 'Configuration/styles.csv';
		$fh = fopen ( $file, 'r' );
		while ( ($data = fgetcsv ( $fh )) !== FALSE ) {
			$file  = $ext_path.'Resources/Public/Styles/'.$data [0].'.html';
			$key = base64_encode(file_get_contents($file));
			$image = 'EXT:addthis/Resources/Public/Styles/'.$data [0].'.png';
			$params ['items'] [] = array ($data [0] , $key,$image );
		}
		fclose ( $fh );
		
	}
	/**
	 * @param array &$params
	 * @param string $file
	 */
	private function readCsv(&$params, $file){
		$fh = fopen ( $file, 'r' );
		while ( ($data = fgetcsv ( $fh )) !== FALSE ) {
			$params ['items'] [] = array ($data [1], $data [0] );
		}
		fclose ( $fh );
	}
}
