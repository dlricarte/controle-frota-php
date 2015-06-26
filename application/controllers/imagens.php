<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagens extends CI_Controller {


	public function __construct(){
		parent::__construct();	
		$this->load->helper("autentica");			
		$this->dados["usuario"] = verifica_sessao();		
	} 

	public function index(){
		$this->load->view('topo', $this->dados);
		$this->load->view('imagens/crop_imagem', $this->dados);
		$this->load->view('rodape');
	}




}


?>