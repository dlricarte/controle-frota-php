<?php

class Motorista extends CI_Model {		
	var $mot_id;
	var $nome;
	var $documento;
	var $categoria;

	var $veiculos;

	public function Veiculos(){
		if(!empty($this->veiculos)){
			return $this->veiculos;
		} else {
			$this->load->model("Veiculo");	
			$this->veiculos = $this->db->get_where("veiculo",array("id_motorista" => $this->id))->result("Veiculo");										
			return $this->veiculos;
		}	
	}	
}

?>