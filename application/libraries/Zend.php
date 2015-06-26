<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CI_Zend
{
	public function __construct($class = NULL) {
		ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . FCPATH . 'application\libraries'); 
		if ($class) {
			require_once (string) $class . EXT;
			log_message('debug', "Zend Class $class Loaded");
		}else {
			log_message('debug', "Zend Class Initialized");
		}

	}

	public function load($sClassName) {
		require_once (string) $sClassName . EXT;
		log_message('debug', "-> Zend Class $sClassName Loaded from the library");
	}


}
//End of File: Zend.php