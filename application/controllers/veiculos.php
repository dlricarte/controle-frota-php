<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Veiculos extends CI_Controller {

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
		$this->load->model("veiculo");
		
		$config['base_url'] = base_url() . 'veiculoes/index';				
		$config['total_rows'] = $this->db->count_all_results("veiculo");		
		
		$this->pagination->initialize($config); 
		
		$this->dados["paginacao"] = $this->pagination->create_links(); 
		
		$this->db->limit(10, $pagina);
		$this->dados["veiculos"] = $this->db->get("veiculo")->result("veiculo");
				
		$this->dados["q"] = "";
		
		$this->load->view('topo', $this->dados);
		$this->load->view('veiculos/lista', $this->dados);
		$this->load->view('rodape');
	}

	public function criar()
	{
		$this->load->model("motorista");
		$this->load->model("setor");
		$this->load->database();

		$this->load->view('topo', $this->dados);
		
		//Motoristas
		$this->db->order_by("nome", "asc");		
		$this->dados["motoristas"] = $this->db->get("motorista")->result("Motorista");
		
		//Setores
		$this->db->order_by("nome", "asc");
		$this->dados["setores"] = $this->db->get("setor")->result("Setor");

		$this->load->view('veiculos/criar', $this->dados);
		$this->load->view('rodape');
	}
	
	public function editar($id)
	{
		$this->load->database();
		$this->load->model("veiculo");
		$this->load->model("motorista");
		$this->load->model("setor");
		
		$veiculo = $this->db->get_where("veiculo", array("id" => $id))->row(0, "veiculo");
		
		if(!$veiculo){						
			show_404("veiculos/excluir");			
		}	
			
		$this->dados["veiculo"] = $veiculo;			
		
		//Motoristas
		$this->db->order_by("nome", "asc");		
		$this->dados["motoristas"] = $this->db->get("motorista")->result("Motorista");
		
		//Setores
		$this->db->order_by("nome", "asc");
		$this->dados["setores"] = $this->db->get("setor")->result("Setor");

		$this->load->view('topo', $this->dados);
		$this->load->view('veiculos/editar', $this->dados);
		$this->load->view('rodape');		
	}

	public function salvar(){
		$this->load->helper(array('form', 'url'));		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('marca', 'Marca', 'required|xss_clean');
		$this->form_validation->set_rules('modelo', 'Modelo', 'required|xss_clean');
		$this->form_validation->set_rules('ano', 'Ano', 'required|integer|greater_than[1900]|xss_clean');
		$this->form_validation->set_rules('placa', 'Placa', 'required|unique[veiculo.placa]|xss_clean');	
		$this->form_validation->set_rules('km', 'Quilometragem', 'required|integer|xss_clean');	
			

		$this->load->view('topo', $this->dados);

		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('veiculos/criar');
		}
		else
		{
			$this->dados = array();	
			$this->dados["marca"] = $this->input->post("marca");	
			$this->dados["modelo"] = $this->input->post("modelo");	
			$this->dados["ano"] = $this->input->post("ano");	
			$this->dados["placa"] = $this->input->post("placa");	
			$this->dados["id_motorista"] = $this->input->post("id_motorista");
			$this->dados["id_setor"] = $this->input->post("id_setor");
			$this->dados["km"] = $this->input->post("km");
			
			$this->load->database();					
			$this->db->insert('veiculo', $this->dados);
			$this->load->view('veiculos/sucesso');
		}
			
		$this->load->view('rodape');
	}

	public function atualizar(){
		$this->load->helper(array('form', 'url'));		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('marca', 'Marca', 'required|xss_clean');
		$this->form_validation->set_rules('modelo', 'Modelo', 'required|xss_clean');
		$this->form_validation->set_rules('ano', 'Ano', 'required|integer|greater_than[1900]|xss_clean');
		$this->form_validation->set_rules('placa', 'Placa', 'required|unique[veiculo.placa]|xss_clean');
		$this->form_validation->set_rules('km', 'Quilometragem', 'required|integer|xss_clean');				
			
		$id = $this->input->post("id");

		$this->load->view('topo', $this->dados);

		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('veiculos/editar');
		}
		else
		{
			$this->dados = array();	
			$this->dados["marca"] = $this->input->post("marca");	
			$this->dados["modelo"] = $this->input->post("modelo");	
			$this->dados["ano"] = $this->input->post("ano");	
			$this->dados["placa"] = $this->input->post("placa");	
			$this->dados["id_motorista"] = $this->input->post("id_motorista");	
			$this->dados["id_setor"] = $this->input->post("id_setor");
			$this->dados["km"] = $this->input->post("km");
			
			$this->load->database();					
			$this->db->where('id', $id);				
			$this->db->update('veiculo', $this->dados);
			$this->load->view('veiculos/atualizado');
		}
			
		$this->load->view('rodape');
	}

	public function excluir($id){
			
		$this->load->database();
		$this->load->model("veiculo");
		
		$veiculo = $this->db->get_where("veiculo", array("id" => $id))->row(0, "veiculo");
		
		if(!$veiculo){						
			show_404("veiculos/excluir");			
		}		
		
		$this->dados["veiculo"] = $veiculo;
		$this->load->view('topo', $this->dados);
		$this->load->view('veiculos/excluir', $this->dados);
		$this->load->view('rodape');
	}
	
	public function apagar($id){
		$this->load->database();
		
		$this->db->where("id", $id);
		$this->db->delete("veiculo");
		
		$this->load->view('topo', $this->dados);
		$this->load->view('veiculos/apagado');
		$this->load->view('rodape');
	}

	public function resultado_busca(){
		$q = $_GET["q"];		
				
		if($q == "" || $q == null){
			redirect("veiculos");
		}
							
			
		if(isset($_GET["pagina"]) && !empty($_GET["pagina"]))	{
			$pagina = $_GET["pagina"];	
		} else {
			$pagina = 0;
		}		
		
		$this->load->library('pagination');	
		$this->load->database();	
		$this->load->model("veiculo");
		
		$this->db->like('placa', $q);		
		$this->db->or_like('marca', $q);
		$this->db->or_like('modelo', $q);
		$this->db->or_like('ano', $q);
						
		$config['base_url'] = base_url('veiculos');	
		$config['total_rows'] = $this->db->count_all_results("veiculo");
		$this->pagination->initialize($config); 
		
		$this->dados["paginacao"] = $this->pagination->create_links(); 
		
		$this->db->like('placa', $q);		
		$this->db->or_like('marca', $q);
		$this->db->or_like('modelo', $q);		
		$this->db->or_like('ano', $q);
		$this->db->limit(10, $pagina * 10);

		$this->dados["veiculos"] = $this->db->get("veiculo")->result("veiculo");
		$this->dados["q"] = $q;
		$this->load->view('topo', $this->dados);
		$this->load->view('veiculos/lista', $this->dados);
		$this->load->view('rodape');
		 
	}


	public function imprimir_lista(){
		
		if(empty($_GET["q"])){
			$q = "";
		} else {
			$q = $_GET["q"];		
		}
		
		$this->load->database();
		$this->load->model("veiculo");

		$this->db->like('placa', $q);		
		$this->db->or_like('marca', $q);
		$this->db->or_like('modelo', $q);
		$this->db->or_like('ano', $q);	
		$this->db->order_by("ano asc, marca asc, modelo asc, placa asc");	

		$this->dados["veiculos"] = $this->db->get("veiculo")->result("veiculo");
		$this->dados["q"] = $q;
		$this->load->view('topo', $this->dados);
		$this->load->view('veiculos/lista_impressao', $this->dados);
		$this->load->view('rodape');
	}

}
?>