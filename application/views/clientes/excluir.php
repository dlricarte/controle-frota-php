
<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('cliente')?>">Cliente</a></li>
	  <li class="active">Exclus&atilde;o de Cliente</li>  
	</ol>
</div>
<div class='row'>
	<h2>Deseja excluir este Cliente?</h2>
	<hr />
	<div class="form-group">
	    <label for="nome">Raz&atilde;o Social:</label>
	    <span><?=$cliente->razao_social?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Nome Fantasia:</label>
	    <span><?=$cliente->nome_fantasia?></span>
	  </div> 
	  <div class="form-group">
	    <label for="nome">CNPJ:</label>
	    <span><?=$cliente->cnpj?></span>
	  </div> 	  
	  <div class="form-group">
	    <label for="nome">Inscri&ccedil;&atilde;o Estadual:</label>
	    <span><?=$cliente->inscricao_estadual?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Inscri&ccedil;&atilde;o Municipal:</label>
	    <span><?=$cliente->inscricao_municipal?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Endere&ccedil;o:</label>
	    <span><?=$cliente->endereco?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Cidade:</label>
	    <span><?=$cliente->cidade?></span>
	  </div> 
	  <div class="form-group">
	    <label for="nome">Estado:</label>
	    <span><?=$cliente->estado?></span>
	  </div>
	   <div class="form-group">
	    <label for="nome">CEP:</label>
	    <span><?=$cliente->cep?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Telefone:</label>
	    <span>
	    	<?php if($cliente->ddd_telefone) : ?>
                <?php echo "(" . $cliente->ddd_telefone . ")"; ?>
              <?php endif; ?>
              
              <?php if($cliente->telefone) : ?>
                <?php echo $cliente->telefone; ?>
              <?php endif; ?>

              <?php if($cliente->ramal_telefone) : ?>
                <?php echo " r: " . $cliente->ramal_telefone; ?>
              <?php endif; ?>
	    </span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Fax:</label>
	    <span>
	    	<?php if($cliente->ddd_fax) : ?>
                <?php echo "(" . $cliente->ddd_fax . ")"; ?>
              <?php endif; ?>
              
              <?php if($cliente->fax) : ?>
                <?php echo $cliente->fax; ?>
              <?php endif; ?>

              <?php if($cliente->ramal_fax) : ?>
                <?php echo " r: " . $cliente->ramal_fax; ?>
              <?php endif; ?>
	    </span>
	  </div>
	   <div class="form-group">
	    <label for="nome">E-mail:</label>
	    <span><?=$cliente->email?></span>
	  </div>

	   <div class="form-group">
	    <label for="nome">Observa&ccedil;&otilde;es:</label>
	    <span><?=$cliente->observacoes?></span>
	  </div> 

  	<a href="<?=base_url("clientes/apagar/" . $cliente->cli_id);?>" type="submit" class="btn btn-danger button-delete">Excluir</a>
    <a href="<?=base_url("clientes/index")?>" type="button" class="btn btn-primary button-listar">Voltar para Lista</a>
	
</div>