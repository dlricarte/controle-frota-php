<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setores extends CI_Controller {

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
		$this->load->model("setor");
		
		$config['base_url'] = base_url() . 'setores/index';				
		$config['total_rows'] = $this->db->count_all_results("setor");		
		
		$this->pagination->initialize($config); 
		
		$this->dados["paginacao"] = $this->pagination->create_links(); 
		
		$this->db->limit(10, $pagina);
		$this->dados["setores"] = $this->db->get("setor")->result("setor");
		
		$this->dados["q"] = "";
		
		$this->load->view('topo', $this->dados);
		$this->load->view('setores/lista', $this->dados);
		$this->load->view('rodape');
	}

	public function criar()
	{
		$this->load->view('topo', $this->dados);
		$this->load->view('setores/criar');
		$this->load->view('rodape');
	}

	public function salvar(){
		$this->load->helper(array('form', 'url'));		
		$this->load->library('form_validation');
		$this->load->database();	
		$this->form_validation->set_rules('nome', 'Nome', 'required|is_unique[setor.nome]|xss_clean');
		
		$this->load->view('topo', $this->dados);
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('setores/criar');
		}
		else
		{
			$this->dados = array();	
			$this->dados["nome"] = $this->input->post("nome");	
			$this->db->insert('setor', $this->dados);
			$this->load->view('setores/sucesso');
		}
			
		$this->load->view('rodape');
	}


	public function editar($id)
	{
		$this->load->database();
		$this->load->model("setor");
		
		$setor = $this->db->get_where("setor", array("id" => $id))->row(0, "setor");
		
		if(!$setor){						
			show_404("setores/excluir");			
		}	
			
		$this->dados["setor"] = $setor;			
				
		$this->load->view('topo', $this->dados);
		$this->load->view('setores/editar', $this->dados);
		$this->load->view('rodape');		
	}


	public function atualizar(){
		$this->load->helper(array('form', 'url'));		
		$this->load->library('form_validation');
		$this->load->database();	
		
		$id = $this->input->post("id");

		$this->form_validation->set_rules('nome', 'Raz&atilde;o Social', 'required|is_unique[setor.nome]|xss_clean');		

		$this->load->view('topo', $this->dados);
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('setores/criar');
		}
		else
		{
			$this->dados = array();	
			$this->dados["nome"] = $this->input->post("nome");						
							
			$this->db->where('id', $id);				
			$this->db->update('setor', $this->dados);
			$this->load->view('setores/atualizado');
		}
			
		$this->load->view('rodape');
	}

	public function excluir($id){
			
		$this->load->database();
		$this->load->model("setor");
		
		$setor = $this->db->get_where("setor", array("id" => $id))->row(0, "setor");
		
		if(!$setor){						
			show_404("setores/excluir");			
		}		
		
		$this->dados["setor"] = $setor;
		$this->load->view('topo', $this->dados);
		$this->load->view('setores/excluir', $this->dados);
		$this->load->view('rodape');
	}
	
	public function apagar($id){
		$this->load->database();
		
		$this->db->where("id", $id);
		$this->db->delete("setor");
		
		$this->load->view('topo', $this->dados);
		$this->load->view('setores/apagado');
		$this->load->view('rodape');
	}

	public function resultado_busca(){
		$q = $_GET["q"];		
				
		if($q == "" || $q == null){
			redirect("setores");
		}
							
			
		if(isset($_GET["pagina"]) && !empty($_GET["pagina"]))	{
			$pagina = $_GET["pagina"];	
		} else {
			$pagina = 0;
		}		
		
		$this->load->library('pagination');	
		$this->load->database();	
		$this->load->model("setor");
		
		$this->db->like('nome', $q);		
		$this->db->or_like('nome_fantasia', $q);		
						
		$config['base_url'] = base_url('setores');	
		$config['total_rows'] = $this->db->count_all_results("setor");
		$this->pagination->initialize($config); 
		
		$this->dados["paginacao"] = $this->pagination->create_links(); 
		
		$this->db->like('nome', $q);		
		
		$this->db->limit(10, $pagina * 10);

		$this->dados["setores"] = $this->db->get("setor")->result("setor");
		$this->dados["q"] = $q;
		$this->load->view('topo', $this->dados);
		$this->load->view('setores/lista', $this->dados);
		$this->load->view('rodape');
		 
	}

}
?>