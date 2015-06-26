
<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('usuarios')?>">Usu&aacute;rios</a></li>
	  <li class="active">Criar Usu&aacute;rio</li>  
	</ol>
</div>

<div class='row'>
	<h3>Exclu&atilde;o de Usu&aacute;rio</h3>	
</div>

<hr />

<div class='row'>
	<div class="form-group">
    	<label for="nome">Nome</label>
    	<span><?=$u->nome?></span>
  	</div>
  	<div class="form-group">
    	<label for="nome">E-Mail</label>
    	<span><?=$u->email?></span>
  	</div>
  	<div class="form-group">
    	<label for="nome">&Uacute;ltimo Login</label>
    	<span><?=$u->data_ultimo_login?></span>
  	</div>
  	
  	<a href="<?=base_url("usuarios/apagar/" . $u->id);?>" type="submit" class="btn btn-danger button-delete">Excluir</a>
    <a href="<?=base_url("usuarios/index")?>" type="button" class="btn btn-primary button-listar">Voltar para Lista</a>
	
</div>