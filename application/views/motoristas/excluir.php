
<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('Motoristas')?>">Motoristas</a></li>
	  <li class="active">Exclus&atilde;o de Categoria</li>  
	</ol>
</div>
<hr />

<div class='row'>
	<h2>Deseja excluir este Motorista?</h2>
	<hr />
	<div class="form-group">
    	<label for="nome">Nome Completo:</label>
    	<span><?=$motorista->nome?></span>
  	</div>
  	<div class="form-group">
    	<label for="nome">Documento:</label>
    	<span><?=$motorista->documento?></span>
  	</div>
  	<div class="form-group">
    	<label for="nome">Categoria da Carteira:</label>
    	<span><?=$motorista->categoria?></span>
  	</div>
  	<a href="<?=base_url("motoristas/apagar/" . $motorista->id);?>" type="submit" class="btn btn-danger button-delete">Excluir</a>
	  <a href="<?=base_url("motoristas/index")?>" type="button" class="btn btn-primary button-listar">Voltar para Lista</a>
	
</div>