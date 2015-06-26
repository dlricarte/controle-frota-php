
<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('veiculos')?>">Ve&iacute;culos</a></li>
	  <li class="active">Exclus&atilde;o de Ve&iacute;culo</li>  
	</ol>
</div>
<hr />

<div class='row'>
  <h2>Deseja excluir este Ve&iacute;culo?</h2>
  <hr />
	<div class="form-group">    
    <label for="nome">Marca</label>
    	<span><?=$veiculo->marca?></span>
  	</div>
  	<div class="form-group">
    	<label for="nome">Modelo</label>
    	<span><?=$veiculo->modelo?></span>
  	</div>
  	<div class="form-group">
    	<label for="nome">Ano</label>
    	<span><?=$veiculo->ano?></span>
  	</div>
  	<div class="form-group">
    	<label for="nome">Placa</label>
    	<span><?=$veiculo->placa?></span>
  	</div>
  	<div class="form-group">
    	<label for="nome">Motorista</label>
    	<span><?=$veiculo->Motorista()->nome?></span>
  	</div>
  	<a href="<?=base_url("veiculos/apagar/" . $veiculo->id);?>" type="submit" class="btn btn-danger button-delete">Excluir</a>
    <a href="<?=base_url("veiculos/index")?>" type="button" class="btn btn-primary button-listar">Voltar para Lista</a>
	
</div>