<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('cria_nome_url'))
{

    function cria_nome_url($string)
    {
        $ci = & get_instance();
		$ci->load->helper("inflector");
		return underscore(remove_acentos($string));
    }       
}


if ( ! function_exists('remove_acentos'))
{
	function remove_acentos($string){    	
		return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $string ) );
    }
}
?>