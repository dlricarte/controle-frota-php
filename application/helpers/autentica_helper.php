<?php

function iniciar_sessao($email, $senha){
	$ci = & get_instance();
	$ci->load->database();
	$ci->load->library('encrypt');	
	
	$ci->db->where(
		array( "email" => $email )
	);
	
	$query = $ci->db->get("usuario");
			
	if ($query->num_rows() > 0){
		$ci->load->library('session');
		$ci->load->model("Usuario");
		$usuario = $query->row(0, "Usuario");
				
		if($ci->encrypt->decode($usuario->senha) != $senha){			
			return false;
		}

		date_default_timezone_set('America/Sao_Paulo');
		$ci->db->where("id", $usuario->id);
		$ci->db->update("usuario", array("data_ultimo_login" => date("Y-m-d H:i:s")));
		
		$ci->session->set_userdata("usuario_logado", serialize($usuario));
		
		return true;
		
	} else {
		return false;
	}
}


function verifica_sessao(){
	$ci = & get_instance();
    $ci->load->library('session');	
	$ci->load->model('Usuario');		
	$usuario = unserialize($ci->session->userdata("usuario_logado"));	
	
	if($usuario){		
		return $usuario;
	} else {		
		redirect("login");
	}
	
}



function encerrar_sessao(){
	$ci = & get_instance();
    $ci->load->library('session');
    $ci->session->unset_userdata('usuario_logado');
}


?>