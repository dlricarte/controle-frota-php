
<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('fornecedores')?>">Fornecedores</a></li>
	  <li class="active">Exclus&atilde;o de Fornecedor</li>  
	</ol>
</div>
<div class='row'>
	<h2>Deseja excluir este Fornecedor?</h2>
	<hr />
	<div class="form-group">
	    <label for="nome">Raz&atilde;o Social:</label>
	    <span><?=$fornecedor->razao_social?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Nome Fantasia:</label>
	    <span><?=$fornecedor->nome_fantasia?></span>
	  </div> 
	  <div class="form-group">
	    <label for="nome">CNPJ:</label>
	    <span><?=$fornecedor->cnpj?></span>
	  </div> 	  
	  <div class="form-group">
	    <label for="nome">Inscri&ccedil;&atilde;o Estadual:</label>
	    <span><?=$fornecedor->inscricao_estadual?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Inscri&ccedil;&atilde;o Municipal:</label>
	    <span><?=$fornecedor->inscricao_municipal?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Endere&ccedil;o:</label>
	    <span><?=$fornecedor->endereco?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Cidade:</label>
	    <span><?=$fornecedor->cidade?></span>
	  </div> 
	  <div class="form-group">
	    <label for="nome">Estado:</label>
	    <span><?=$fornecedor->estado?></span>
	  </div>
	   <div class="form-group">
	    <label for="nome">CEP:</label>
	    <span><?=$fornecedor->cep?></span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Telefone:</label>
	    <span>
	    	<?php if($fornecedor->ddd_telefone) : ?>
                <?php echo "(" . $fornecedor->ddd_telefone . ")"; ?>
              <?php endif; ?>
              
              <?php if($fornecedor->telefone) : ?>
                <?php echo $fornecedor->telefone; ?>
              <?php endif; ?>

              <?php if($fornecedor->ramal_telefone) : ?>
                <?php echo " r: " . $fornecedor->ramal_telefone; ?>
              <?php endif; ?>
	    </span>
	  </div>
	  <div class="form-group">
	    <label for="nome">Fax:</label>
	    <span>
	    	<?php if($fornecedor->ddd_fax) : ?>
                <?php echo "(" . $fornecedor->ddd_fax . ")"; ?>
              <?php endif; ?>
              
              <?php if($fornecedor->fax) : ?>
                <?php echo $fornecedor->fax; ?>
              <?php endif; ?>

              <?php if($fornecedor->ramal_fax) : ?>
                <?php echo " r: " . $fornecedor->ramal_fax; ?>
              <?php endif; ?>
	    </span>
	  </div>
	   <div class="form-group">
	    <label for="nome">E-mail:</label>
	    <span><?=$fornecedor->email?></span>
	  </div>

	   <div class="form-group">
	    <label for="nome">Observa&ccedil;&otilde;es:</label>
	    <span><?=$fornecedor->observacoes?></span>
	  </div> 

  	<a href="<?=base_url("fornecedores/apagar/" . $fornecedor->for_id);?>" type="submit" class="btn btn-danger button-delete">Excluir</a>
    <a href="<?=base_url("fornecedores/index")?>" type="button" class="btn btn-primary button-listar">Voltar para Lista</a>
	
</div>