<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	private $dados;
	 
	public function __construct(){
		parent::__construct();	
		$this->load->helper("autentica");			
		$this->dados["usuario"] = verifica_sessao();		
	} 
	 
	public function index($pagina = 0)
	{
		if(isset($_GET["pagina"]) && !empty($_GET["pagina"]))	{
			$pagina = $_GET["pagina"];	
		} else {
			$pagina = 0;
		}		
				
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->database();
		$this->load->model("usuario");
						
		$config['total_rows'] = $this->db->count_all_results("usuario");;
		$this->pagination->initialize($config); 
		
		$this->dados["paginacao"] = $this->pagination->create_links(); 
		
		$this->db->limit(10, $pagina * 10);
		$this->dados["usuarios"] = $this->db->get("usuario")->result("Usuario");
		
		$this->dados["q"] = "";
		
		$this->load->view('topo', $this->dados);
		$this->load->view('usuarios/lista', $this->dados);
		$this->load->view('rodape');
	}
	
	public function criar()
	{
		$this->load->helper('form');
		$this->load->view('topo', $this->dados);
		$this->load->view('usuarios/criar');
		$this->load->view('rodape');
	}
	
	public function editar($id)
	{
		$this->load->database();
		$this->load->model("usuario");
		
		$usuario = $this->db->get_where("usuario", array("id" => $id))->row(0, "Usuario");
		
		if(!$usuario){						
			show_404("usuarios/excluir");			
		}	
				
		$this->dados["usuario"] = $usuario;				
		
		$this->load->view('topo', $this->dados);
		$this->load->view('usuarios/editar', $this->dados);
		$this->load->view('rodape');
		
	}
	
	public function salvar()
	{
			
		$this->load->helper(array('form', 'url'));		
		$this->load->library(array('form_validation', 'encrypt'));

		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|matches[confirme_email]|valid_email');
		$this->form_validation->set_rules('confirme_email', 'Confirme o e-mail', 'required');
		$this->form_validation->set_rules('senha', 'senha', 'required|matches[confirme_senha]|min_length[6]');
		$this->form_validation->set_rules('confirme_senha', 'Confirme a senha', 'required');

		$this->load->view('topo', $this->dados);

		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('usuarios/criar');
		}
		else
		{
			$this->dados = array(
					"nome" => $this->input->post("nome"),
					"email" => $this->input->post("email"),
					"senha" => $this->encrypt->encode($this->input->post("senha"))
			);	
			
			$this->load->database();					
			$this->db->insert('usuario', $this->dados);
			$this->load->view('usuarios/sucesso');
		}
			
		$this->load->view('rodape');
	}	

	public function atualizar(){
		$this->load->helper(array('form', 'url'));		
		$this->load->library('form_validation');		
		$this->load->database();
		
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|matches[confirme_email]|valid_email');
		$this->form_validation->set_rules('confirme_email', 'Confirme o e-mail', 'required');		
		
		$id = $this->input->post("id");
		$this->load->model("usuario");
			
		$data = array();

		$this->load->view('topo', $this->dados);

		if ($this->form_validation->run() == FALSE)
		{
			$data["usuario"] = $this->db->get_where("usuario", array("id" => $id))->row(0, "Usuario");	
			$this->load->view('usuarios/editar', $data);
		}
		else
		{
			$this->dados = array("nome" => $this->input->post("nome"),"email" => $this->input->post("email"));	
			
			$this->load->database();	
			$this->db->where('id', $id);				
			$this->db->update('usuario', $this->dados);
			$this->load->view('usuarios/atualizado');
		}
			
		$this->load->view('rodape');
		
	}

	public function atualizar_senha(){
		$this->load->helper(array('form', 'url'));		
		$this->load->library(array('form_validation', 'encrypt'));		
		$this->load->database();
		
		$this->form_validation->set_rules('senha_antiga', 'Senha Atual', 'required|callback_senha_check');
		$this->form_validation->set_rules('senha', 'Nova Senha', 'required|matches[confirme_senha]|min_length[6]');
		$this->form_validation->set_rules('confirme_senha', 'Confirme a nova senha', 'required');		
		
		$id = $this->input->post("id");
		$this->load->model("usuario");
		
		$this->load->view('topo', $this->dados);

		if ($this->form_validation->run() == FALSE)
		{
			$data["usuario"] = $this->db->get_where("usuario", array("id" => $id))->row(0, "Usuario");	
			$this->load->view('usuarios/editar', $data);
		}
		else
		{
			$senha_atualizada = $this->encrypt->encode($this->input->post("senha"));
			$this->dados = array("senha" => $senha_atualizada);	
			
			$this->load->database();	
			$this->db->where('id', $id);				
			$this->db->update('usuario', $this->dados);
			$this->load->view('usuarios/senha_atualizada');		
		}	
	}

	public function excluir($id){
		$this->load->database();
		$this->load->model("usuario");
		
		$usuario = $this->db->get_where("usuario", array("id" => $id))->row(0, "Usuario");
		
		if(!$usuario){						
			show_404("usuarios/excluir");			
		}			
				
		$this->dados["usuario"] = $usuario;		
				
		$this->load->helper('form');
		$this->load->view('topo', $this->dados);
		$this->load->view('usuarios/excluir', $this->dados);
		$this->load->view('rodape');
	}
	
	public function apagar($id){
		$this->load->database();
		
		$this->db->where("id", $id);
		$this->db->delete("usuario");
		
		$this->load->view('topo', $this->dados);
		$this->load->view('usuarios/apagado');
		$this->load->view('rodape');
	}
	
	public function resultado_busca(){
		$q = $_GET["q"];		
				
		if($q == "" || $q == null){
			redirect("usuarios");
		}							
			
		if(isset($_GET["pagina"]) && !empty($_GET["pagina"]))	{
			$pagina = $_GET["pagina"];	
		} else {
			$pagina = 0;
		}		
		
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->database();
		$this->load->model("usuario");
		
		$this->db->like('nome', $q);
		$this->db->or_like('email', $q); 		
						
		$config['total_rows'] = $this->db->count_all_results("usuario");;
		$this->pagination->initialize($config); 
		
		$this->dados["paginacao"] = $this->pagination->create_links(); 
		
		$this->db->like('nome', $q);
		$this->db->or_like('email', $q); 
		$this->db->limit(10, $pagina * 10);
		$this->dados["usuarios"] = $this->db->get("usuario")->result("Usuario");
		$this->dados["q"] = $q;
		$this->load->view('topo', $this->dados);
		$this->load->view('usuarios/lista', $this->dados);
		$this->load->view('rodape');		 
	}	


	function senha_check($str){
		if($str == ""){
			$this->form_validation->set_message('senha_check', 'Senha atual invÃ¡lida');
			return false;
		} else {			
			$id = $this->input->post("id");
			$usuario_old = $this->db->get_where("usuario", array("id" => $id))->row(0, "Usuario");

			$senha_old = $this->encrypt->decode($usuario_old->senha);

			if($senha_old != $str){
				$this->form_validation->set_message('senha_check', 'Senha atual invÃ¡lida');
				return false;
			} else{
				return true;
			}
		}
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */