<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abastecimentos extends CI_Controller {

	private $dados;
	 
	public function __construct(){
		parent::__construct();	
		$this->load->helper("autentica");			
		$this->dados["usuario"] = verifica_sessao();		
	} 
	
	public function index($pagina = 0)
	{
		$this->load->library('pagination');		
		$this->load->database();
		$this->load->model("abastecimento");

		
		$config['base_url'] = base_url() . 'abastecimentos/index';				
		$config['total_rows'] = $this->db->count_all_results("abastecimento");		
		
		$this->pagination->initialize($config); 
		
		$this->dados["paginacao"] = $this->pagination->create_links(); 
		
		$this->db->limit(10, $pagina);
		$this->dados["abastecimentos"] = $this->db->get("abastecimento")->result("abastecimento");
				
		$this->dados["q"] = "";
		$this->dados["data_ini"] = "";
		$this->dados["data_fim"] = "";
		
		$this->load->view('topo', $this->dados);
		$this->load->view('abastecimentos/lista', $this->dados);
		$this->load->view('rodape');
		$this->load->view('abastecimentos/javascript');
	}

}