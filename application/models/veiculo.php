<?php

class Veiculo extends CI_Model {		
	var $vei_id;
	var $marca;
	var $modelo;
	var $placa;
	var $ano;
	var $motorista;
	var $id_motorista;
	var $km;
	var $setor;
	var $id_setor;

	public function Motorista(){
		if($this->motorista != null){
			return $this->motorista;
		} else {
			$this->load->model("Motorista");	
			if($this->id_motorista > 0){				
				$this->motorista = $this->db->get_where("motorista",array("id" => $this->id_motorista))->row(0, "Motorista");				
				
				if(!empty($this->motorista)){
					return $this->motorista;
				}	
			}
			
			$this->motorista = new Motorista();
			$this->motorista->nome = "Sem Motorista";

			return $this->motorista;
		}	
	}

	public function Setor(){
		if($this->setor != null){
			return $this->setor;
		} else {
			$this->load->model("Setor");
			if($this->id_setor > 0){
				$this->setor = $this->db->get_where("setor",array("id" => $this->id_setor))->row(0, "Setor");

				if(!empty($this->setor)){
					return $this->setor;
				}
			} 

			$this->setor = new Setor();
			$this->setor->nome = "Sem Setor definido";

			return $this->setor;
		}
	}


}

?>