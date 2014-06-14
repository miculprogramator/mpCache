<?php

/**
 * @Package: Micul-Programator.ro simple cache
 * @Author: Marian
 * @$Date: 06/14/2014
 * @Contact: contact@micul-programato.ro
 * @$Rev: 1 
 */
class mpCache {

    /**
    * Directorul unde vor fi stocate fisierele de cache
    */
	private static $_dir = "cacheFiles/"; 

    /**
    * Scrie un fisier .json in care vor fi stocate datele
    * @param  string $identificator -> identifica in mod unic un fisier de cache
    * @param  array $data -> array-ul cu datele primite de la baza de date
    * @return void
    */
	public static function  writeCache($identificator = null , $data = array()) {

		if ( !$identificator || !count($data) ) { return false; }

		file_put_contents(trim(mpCache::$_dir.$identificator).".json",json_encode($data));

	}

	/**
	* Citeste un fisier .json si returneaza continutul acestuia
	* @param string $identificator -> identifica in mod unic un fisier de cache
	* @return array $data -> continutul fisierului de cache este returnat ca array 
	*/
	public static function readCache($identificator = null) {

		if ( $identificator == null ) { return array(); }
		$file = trim(mpCache::$_dir.$identificator).".json";
		
		if (!file_exists($file)) {
			return array();
		}

		$data =  file_get_contents(trim(mpCache::$_dir.$identificator).".json");
		return json_decode($data,true);

	}

    /**
	* Sterge un fisier cache
	* @param string $identificator -> identifica in mod unic un fisier de cache
	* @return boolean 
	*/
	public static function deleteCache($identificator = null) {

		$file = trim(mpCache::$_dir.$identificator).".json";
		
		if (!file_exists($file)) {
			return true;
		} 

		if (unlink($file)) {
			return true;
		}

		return false;

	}
}

?>