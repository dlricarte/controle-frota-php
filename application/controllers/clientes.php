<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller {

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
		$this->load->model("cliente");
		
		$config['base_url'] = base_url() . 'clientes/index';				
		$config['total_rows'] = $this->db->count_all_results("cliente");		
		
		$this->pagination->initialize($config); 
		
		$this->dados["paginacao"] = $this->pagination->create_links(); 
		
		$this->db->limit(10, $pagina);
		$this->dados["clientes"] = $this->db->get("cliente")->result("cliente");
		
		$this->dados["q"] = "";
		
		$this->load->view('topo', $this->dados);
		$this->load->view('clientes/lista', $this->dados);
		$this->load->view('rodape');
	}

	public function criar()
	{
		$this->load->view('topo', $this->dados);
		$this->load->view('clientes/criar');
		$this->load->view('rodape');
	}

	public function salvar(){
		$this->load->helper(array('form', 'url'));		
		$this->load->library('form_validation');
		$this->load->database();	
		$this->form_validation->set_rules('razao_social', 'Raz&atilde;o Social', 'required|is_unique[cliente.razao_social]|xss_clean');
		
		$this->form_validation->set_rules('nome_fantasia', 'Nome Fantasia', 'required|is_unique[cliente.nome_fantasia]|xss_clean');
		$this->form_validation->set_rules('cnpj', 'CNPJ', 'required|callback_cnpj_check|xss_clean');
		$this->form_validation->set_rules('inscricao_estadual', 'Inscri&ccedil;&atilde;o Estadual', 'is_unique[cliente.inscricao_estadual]|xss_clean');
		$this->form_validation->set_rules('inscricao_municipal', 'Inscri&ccedil;&atilde;o Municipal', 'is_unique[cliente.inscricao_municipal]|xss_clean');
		
		$this->form_validation->set_rules('endereco', 'Endere&ccedil;o', 'required|xss_clean');
		$this->form_validation->set_rules('cidade', 'Cidade', 'required|xss_clean');
		$this->form_validation->set_rules('estado', 'Estado', 'required');

		$this->form_validation->set_rules('cep', 'Cep', 'required|callback_cep_check|xss_clean');		
		
		$this->form_validation->set_rules('ddd_telefone', 'DDD do Telefone', 'required|integer|xss_clean');
		$this->form_validation->set_rules('telefone', 'Telefone', 'required|is_unique[cliente.telefone]|callback_telefone_check|xss_clean');
		$this->form_validation->set_rules('ramal_telefone', 'Ramal do Telefone', 'numeric|xss_clean');
		
		$this->form_validation->set_rules('ddd_fax', 'DDD do Fax', 'integer|xss_clean');
		$this->form_validation->set_rules('fax', 'Fax', 'is_unique[cliente.fax]|callback_fax_check|xss_clean');
		$this->form_validation->set_rules('ramal_fax', 'Ramal do Fax', 'numeric|xss_clean');
		
		$this->form_validation->set_rules('email', 'N&uacute;mero do Documento', 'valid_email');
		
		$this->form_validation->set_rules('contato', 'Contato', 'xss_clean');
		$this->form_validation->set_rules('observacoes', 'Observa&ccedil;&otlde;es', 'xss_clean|max_length[2000]');

		$this->load->view('topo', $this->dados);
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('clientes/criar');
		}
		else
		{
			$this->dados = array();	
			$this->dados["razao_social"] = $this->input->post("razao_social");	
			$this->dados["nome_fantasia"] = $this->input->post("nome_fantasia");	
			$this->dados["cnpj"] = $this->input->post("cnpj");
			$this->dados["inscricao_estadual"] = $this->input->post("inscricao_estadual");	
			$this->dados["inscricao_municipal"] = $this->input->post("inscricao_municipal");	
			$this->dados["endereco"] = $this->input->post("endereco");
			$this->dados["cidade"] = $this->input->post("cidade");	
			$this->dados["estado"] = $this->input->post("estado");	
			$this->dados["cep"] = $this->input->post("cep");
			$this->dados["ddd_telefone"] = $this->input->post("ddd_telefone");	
			$this->dados["telefone"] = $this->input->post("telefone");	
			$this->dados["ramal_telefone"] = $this->input->post("ramal_telefone");
			$this->dados["ddd_fax"] = $this->input->post("ddd_fax");	
			$this->dados["fax"] = $this->input->post("fax");	
			$this->dados["ramal_fax"] = $this->input->post("ramal_fax");	
			$this->dados["email"] = $this->input->post("email");	
			$this->dados["contato"] = $this->input->post("contato");	
			$this->dados["observacoes"] = $this->input->post("observacoes");		
							
			$this->db->insert('cliente', $this->dados);
			
			
			//Indexa no Lucene
			$lucene = $this->_abrirIndice();
			$doc = new Zend_Search_Lucene_Document();            
			$doc->addField(Zend_Search_Lucene_Field::Keyword(
				'cli_id', $this->sanitize($this->db->insert_id())));      
			$doc->addField(Zend_Search_Lucene_Field::Text(
				'razao_social', $this->sanitize($this->input->post("razao_social"))));
			$doc->addField(Zend_Search_Lucene_Field::Text(
				'nome_fantasia', $this->sanitize($this->input->post("nome_fantasia"))));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed(
				'ddd_telefone', $this->sanitize($this->input->post("ddd_telefone"))));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed(
				'telefone', $this->sanitize($this->input->post("telefone"))));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed(
				'ramal_telefone', $this->sanitize($this->input->post("ramal_telefone"))));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed(
				'ddd_fax', $this->sanitize($this->input->post("ddd_fax"))));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed(
				'fax', $this->sanitize($this->input->post("fax"))));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed(
				'ramal_fax', $this->sanitize($this->input->post("ramal_fax"))));
			$doc->addField(Zend_Search_Lucene_Field::Text(
				'contato', $this->sanitize($this->input->post("contato"))));				
				
			$lucene->addDocument($doc);  
			$lucene->commit();
			
			$this->load->view('clientes/sucesso');
		}
			
		$this->load->view('rodape');
	}


	public function editar($id)
	{
		$this->load->database();
		$this->load->model("cliente");
		
		$cliente = $this->db->get_where("cliente", array("cli_id" => $id))->row(0, "cliente");
		
		if(!$cliente){						
			show_404("clientes/excluir");			
		}	
			
		$this->dados["cliente"] = $cliente;			
				
		$this->load->view('topo', $this->dados);
		$this->load->view('clientes/editar', $this->dados);
		$this->load->view('rodape');		
	}


	public function atualizar(){
		$this->load->helper(array('form', 'url'));		
		$this->load->library('form_validation');
		$this->load->database();	
		
		$id = $this->input->post("id");

		$this->form_validation->set_rules('razao_social', 'Raz&atilde;o Social', 'required|xss_clean');
		
		$this->form_validation->set_rules('nome_fantasia', 'Nome Fantasia', 'required|xss_clean');
		$this->form_validation->set_rules('cnpj', 'CNPJ', 'required|callback_cnpj_check|xss_clean');
		$this->form_validation->set_rules('inscricao_estadual', 'Inscri&ccedil;&atilde;o Estadual', 'xss_clean');
		$this->form_validation->set_rules('inscricao_municipal', 'Inscri&ccedil;&atilde;o Municipal', 'xss_clean');
		
		$this->form_validation->set_rules('endereco', 'Endere&ccedil;o', 'required|xss_clean');
		$this->form_validation->set_rules('cidade', 'Cidade', 'required|xss_clean');
		$this->form_validation->set_rules('estado', 'Estado', 'required');

		$this->form_validation->set_rules('cep', 'Cep', 'required|callback_cep_check|xss_clean');		
		
		$this->form_validation->set_rules('ddd_telefone', 'DDD do Telefone', 'required|integer|xss_clean');
		$this->form_validation->set_rules('telefone', 'Telefone', 'required|callback_telefone_check|xss_clean');
		$this->form_validation->set_rules('ramal_telefone', 'Ramal do Telefone', 'numeric|xss_clean');
		
		$this->form_validation->set_rules('ddd_fax', 'DDD do Fax', 'integer|xss_clean');
		$this->form_validation->set_rules('fax', 'Fax', 'callback_fax_check|xss_clean');
		$this->form_validation->set_rules('ramal_fax', 'Ramal do Fax', 'numeric|xss_clean');
		
		$this->form_validation->set_rules('email', 'N&uacute;mero do Documento', 'valid_email');
		
		$this->form_validation->set_rules('contato', 'Contato', 'xss_clean');
		$this->form_validation->set_rules('observacoes', 'Observa&ccedil;&otlde;es', 'xss_clean|max_length[2000]');

		$this->load->view('topo', $this->dados);
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('clientes/criar');
		}
		else
		{
			$this->dados = array();	
			$this->dados["razao_social"] = $this->input->post("razao_social");	
			$this->dados["nome_fantasia"] = $this->input->post("nome_fantasia");	
			$this->dados["cnpj"] = $this->input->post("cnpj");
			$this->dados["inscricao_estadual"] = $this->input->post("inscricao_estadual");	
			$this->dados["inscricao_municipal"] = $this->input->post("inscricao_municipal");	
			$this->dados["endereco"] = $this->input->post("endereco");
			$this->dados["cidade"] = $this->input->post("cidade");	
			$this->dados["estado"] = $this->input->post("estado");	
			$this->dados["cep"] = $this->input->post("cep");
			$this->dados["ddd_telefone"] = $this->input->post("ddd_telefone");	
			$this->dados["telefone"] = $this->input->post("telefone");	
			$this->dados["ramal_telefone"] = $this->input->post("ramal_telefone");
			$this->dados["ddd_fax"] = $this->input->post("ddd_fax");	
			$this->dados["fax"] = $this->input->post("fax");	
			$this->dados["ramal_fax"] = $this->input->post("ramal_fax");	
			$this->dados["email"] = $this->input->post("email");	
			$this->dados["contato"] = $this->input->post("contato");	
			$this->dados["observacoes"] = $this->input->post("observacoes");		
							
			$this->db->where('cli_id', $id);				
			$this->db->update('cliente', $this->dados);
			
			//Indexa no Lucene
			$lucene = $this->_abrirIndice();
			
			$removePath = "for_id:" . $id;
			$hits = $lucene->find($removePath);
			foreach ($hits as $hit) {
				echo $hit->nome_fantasia;
				echo $hit->id;
				echo $hit->cli_id;
				//$lucene->delete($hit->id);
			}									
			
			$doc = new Zend_Search_Lucene_Document();            
			$doc->addField(Zend_Search_Lucene_Field::Keyword(
				'cli_id', $id));      
			$doc->addField(Zend_Search_Lucene_Field::Text(
				'razao_social', $this->sanitize($this->input->post("razao_social"))));
			$doc->addField(Zend_Search_Lucene_Field::Text(
				'nome_fantasia', $this->sanitize($this->input->post("nome_fantasia"))));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed(
				'ddd_telefone', $this->sanitize($this->input->post("ddd_telefone"))));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed(
				'telefone', $this->sanitize($this->input->post("telefone"))));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed(
				'ramal_telefone', $this->sanitize($this->input->post("ramal_telefone"))));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed(
				'ddd_fax', $this->sanitize($this->input->post("ddd_fax"))));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed(
				'fax', $this->sanitize($this->input->post("fax"))));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed(
				'ramal_fax', $this->sanitize($this->input->post("ramal_fax"))));
			$doc->addField(Zend_Search_Lucene_Field::Text(
				'contato', $this->sanitize($this->input->post("contato"))));
			
			$lucene->addDocument($doc);  
			$lucene->commit();
			
			$this->load->view('clientes/atualizado');
		}
			
		$this->load->view('rodape');
	}

	public function excluir($id){
			
		$this->load->database();
		$this->load->model("cliente");
		
		$cliente = $this->db->get_where("cliente", array("cli_id" => $id))->row(0, "cliente");
		
		if(!$cliente){						
			show_404("clientes/excluir");			
		}		
		
		$this->dados["cliente"] = $cliente;
		$this->load->view('topo', $this->dados);
		$this->load->view('clientes/excluir', $this->dados);
		$this->load->view('rodape');
	}
	
	public function apagar($id){
		$this->load->database();
		
		$this->db->where("cli_id", $id);
		$this->db->delete("cliente");
		
		//remove do indice do lucene
		$lucene = $this->_abrirIndice();
		$removePath = "cli_id:" . $id;
		$hits = $lucene->find($removePath);
		foreach ($hits as $hit) {
			$lucene->delete($hit->id);
		}
		
		$lucene->commit();
		
		$this->load->view('topo', $this->dados);
		$this->load->view('clientes/apagado');
		$this->load->view('rodape');
	}

	public function resultado_busca(){
		$q = $_GET["q"];		
				
		if($q == "" || $q == null || strlen($q) < 3){
			$this->session->set_flashdata('erro', 'Você deve digitar ao menos 03 caratceres para realizar a busca.');
			redirect("clientes");
		}							
			
		if(isset($_GET["pagina"]) && !empty($_GET["pagina"]))	{
			$pagina = $_GET["pagina"];	
		} else {
			$pagina = 0;
		}		
		
		$this->load->library('pagination');	
		$this->load->database();	
		$this->load->model("cliente");
		
		$lucene = $this->_abrirIndice();		
		$hits = $lucene->find("razao_social:$q* OR nome_fantasia:$q* OR contato:$q*");  
						
		$config['base_url'] = base_url('clientes');	
		$config['total_rows'] = $lucene->count();
		$this->pagination->initialize($config); 
		
		$this->dados["paginacao"] = $this->pagination->create_links(); 
				
		$this->dados["clientes"] = $hits;
		$this->dados["q"] = $q;
		$this->load->view('topo', $this->dados);
		$this->load->view('clientes/lista', $this->dados);
		$this->load->view('rodape');
		 
	}
	
	public function _abrirIndice(){
		$caminho_indice = APPPATH . "lucene\controle_frota_index";
		
		/** Indexa no Lucene*/
		$this->load->library('zend', 'Zend/Feed');
		$this->load->library('zend', 'Zend/Search/Lucene');
		$this->load->library('zend');
		$this->zend->load('Zend/Feed');
		$this->zend->load('Zend/Search/Lucene');
		
		if(!file_exists($caminho_indice)){
			return Zend_Search_Lucene::create($caminho_indice); 
		} else {
			return Zend_Search_Lucene::open($caminho_indice); 
		}
		
	}


	/**
	  * Funcoes de validação de campos
	  *
	  */

	public function telefone_check($telefone){	
		if (!preg_match("/^[0-9]{4,5}-*[0-9]{4}$/", $telefone) && $telefone != "")
		{
			$this->form_validation->set_message('telefone_check', 'N&uacute;mero de telefone inv&aacute;lido');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function fax_check($fax){	
		if (!preg_match("/^[0-9]{4,5}-*[0-9]{4}$/", $fax) && $fax != "")
		{
			$this->form_validation->set_message('fax_check', 'N&uacute;mero de telefone inv&aacute;lido');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	

	public function cnpj_check($cnpj){		
		if (!preg_match("/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/", $cnpj))
		{
			$this->form_validation->set_message('cnpj_check', 'N&uacute;mero Cnpj inv&aacute;lido');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function cep_check($cep){		
		if (!preg_match("/^\d{5}-\d{3}$/", $cep))
		{
			$this->form_validation->set_message('cep_check', 'N&uacute;mero Cep inv&aacute;lido');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function sanitize($input){
        return htmlentities(strip_tags($input));
    }

}
?>