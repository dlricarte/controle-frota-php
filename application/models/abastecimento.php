<?php

class Abastecimento extends CI_Model {		
	var $abs_id;
	var $data;
	var $combustivel;
	var $quantidade;
	var $unidade;
	var $preco_unitario;
	var $total;

	var $id_veiculo;
	var $veiculo;
	var $id_fornecedor;
	var $fornecedor;

	public function Veiculo(){
		if($this->veiculo != null){
			return $this->veiculo;
		} else {
			$this->load->model("veiculo");
			if($this->id_veiculo > 0){
				$this->veiculo = $this->db->get_where("veiculo",array("id" => $this->id_veiculo))->row(0, "veiculo");

				if(!empty($this->veiculo)){
					return $this->veiculo;
				}
			} 

			$this->veiculo = new Veiculo();
			return $this->veiculo;
		}
	}

	public function Fornecedor(){
		if($this->fornecedor != null){
			return $this->fornecedor;
		} else {
			$this->load->model("fornecedor");
			if($this->id_fornecedor > 0){
				$this->fornecedor = $this->db->get_where("fornecedor",array("id" => $this->id_fornecedor))->row(0, "fornecedor");

				if(!empty($this->fornecedor)){
					return $this->fornecedor;
				}
			} 

			$this->fornecedor = new Fornecedor();
			return $this->fornecedor;
		}
	}


}

?>