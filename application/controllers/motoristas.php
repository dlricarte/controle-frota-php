<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Motoristas extends CI_Controller {

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
		$this->load->model("motorista");
		
		$config['base_url'] = base_url() . 'motoristas/index';				
		$config['total_rows'] = $this->db->count_all_results("motorista");		
		
		$this->pagination->initialize($config); 
		
		$this->dados["paginacao"] = $this->pagination->create_links(); 
		
		$this->db->limit(10, $pagina);
		$this->db->order_by("nome");
		$this->dados["motoristas"] = $this->db->get("motorista")->result("motorista");
		
		$this->dados["q"] = "";
		
		$this->load->view('topo', $this->dados);
		$this->load->view('motoristas/lista', $this->dados);
		$this->load->view('rodape');
	}

	public function criar()
	{
		$this->load->view('topo', $this->dados);
		$this->load->view('motoristas/criar');
		$this->load->view('rodape');
	}
	
	public function editar($id)
	{
		$this->load->database();
		$this->load->model("motorista");
		
		$motorista = $this->db->get_where("motorista", array("mot_id" => $id))->row(0, "Motorista");
		
		if(!$motorista){						
			show_404("motoristas/excluir");			
		}	
			
		$this->dados["motorista"] = $motorista;			
				
		$this->load->view('topo', $this->dados);
		$this->load->view('motoristas/editar', $this->dados);
		$this->load->view('rodape');		
	}

	public function salvar(){
		$this->load->helper(array('form', 'url'));		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome', 'Nome', 'required|is_unique[motorista.nome]|xss_clean');
		$this->form_validation->set_rules('documento', 'N&uacute;mero do Documento', 'required|is_unique[motorista.documento]|xss_clean');
		$this->form_validation->set_rules('categoria', 'Categoria da Carteira', 'required|xss_clean');
			

		$this->load->view('topo', $this->dados);

		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('motoristas/criar');
		}
		else
		{
			$this->dados = array();	
			$this->dados["nome"] = $this->input->post("nome");	
			$this->dados["documento"] = $this->input->post("documento");	
			$this->dados["categoria"] = $this->input->post("categoria");	
			
			$this->load->database();					
			$this->db->insert('motorista', $this->dados);
			$this->load->view('motoristas/sucesso');
		}
			
		$this->load->view('rodape');
	}

	public function atualizar(){
		$this->load->helper(array('form', 'url'));		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome', 'Nome', 'required|is_unique[motorista.nome]|xss_clean');
		$this->form_validation->set_rules('documento', 'N&uacute;mero do Documento', 'required|is_unique[motorista.documento]|xss_clean');
		$this->form_validation->set_rules('categoria', 'Categoria da Carteira', 'required|xss_clean');
			
		$id = $this->input->post("id");

		$this->load->view('topo', $this->dados);

		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('motoristas/editar');
		}
		else
		{
			$this->dados = array();	
			$this->dados["nome"] = $this->input->post("nome");	
			$this->dados["documento"] = $this->input->post("documento");	
			$this->dados["categoria"] = $this->input->post("categoria");	
			
			$this->load->database();					
			$this->db->where('mot_id', $id);				
			$this->db->update('motorista', $this->dados);
			$this->load->view('motoristas/atualizado');
		}
			
		$this->load->view('rodape');
	}

	public function excluir($id){
			
		$this->load->database();
		$this->load->model("motorista");
		
		$motorista = $this->db->get_where("motorista", array("id" => $id))->row(0, "Motorista");
		
		if(!$motorista){						
			show_404("motoristas/excluir");			
		}		
		
		$this->dados["motorista"] = $motorista;
		$this->load->view('topo', $this->dados);
		$this->load->view('motoristas/excluir', $this->dados);
		$this->load->view('rodape');
	}
	
	public function apagar($id){
		$this->load->database();
		
		$this->db->where("id", $id);
		$this->db->delete("motorista");
		
		$this->load->view('topo', $this->dados);
		$this->load->view('motoristas/apagado');
		$this->load->view('rodape');
	}

	public function resultado_busca(){
		$q = $_GET["q"];		
				
		if($q == "" || $q == null){
			redirect("motoristas");
		}
							
			
		if(isset($_GET["pagina"]) && !empty($_GET["pagina"]))	{
			$pagina = $_GET["pagina"];	
		} else {
			$pagina = 0;
		}		
		
		$this->load->library('pagination');	
		$this->load->database();	
		$this->load->model("motorista");
		
		$this->db->like('nome', $q);			
						
		$config['base_url'] = base_url('motoristas');	
		$config['total_rows'] = $this->db->count_all_results("motorista");
		$this->pagination->initialize($config); 
		
		$this->dados["paginacao"] = $this->pagination->create_links(); 
		
		$this->db->like('nome', $q);		
		$this->db->limit(10, $pagina * 10);
		$this->db->order_by("nome");
		$this->dados["motoristas"] = $this->db->get("motorista")->result("Motorista");
		$this->dados["q"] = $q;
		$this->load->view('topo', $this->dados);
		$this->load->view('motoristas/lista', $this->dados);
		$this->load->view('rodape');
		 
	}

}
?>