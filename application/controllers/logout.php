<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	
	public function index()
	{
		$this->load->helper("autentica");
		encerrar_sessao();
		redirect("login");
	}
}
