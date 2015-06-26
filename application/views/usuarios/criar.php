
<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('leitores')?>">Usu&aacute;rios</a></li>
	  <li class="active">Criar Usu&aacute;rio</li>  
	</ol>
</div>

<?php if(validation_errors()) : ?>
<div class='row'>
	<div class="alert alert-danger">
		<?php echo validation_errors(); ?>
	</div>
</div>
<?php endif; ?>



<div class='row'>
	<h2>Cadastro de Usu&aacute;rios</h2>
	<hr />
	<?=form_open('usuarios/salvar', array('role' => 'form'));?>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nome</label>
	    <input type="text" class="form-control" id="nome" name="nome" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email</label>
	    <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Confirme o e-mail</label>
	    <input type="email" class="form-control" id="confirme_email" name="confirme_email" placeholder="email@example.com">
	  </div>	  
	  <div class="form-group">
	    <label for="exampleInputEmail1">Senha</label>
	    <input type="password" class="form-control" id="senha" name="senha" placeholder="senha">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Confirme a senha</label>
	    <input type="password" class="form-control" id="confirme_senha" name="confirme_senha" placeholder="senha">
	  </div>	  
	  <hr />
	  <button type="submit" class="btn btn-primary button-salvar">Salvar</button>
	  <button type="button" onclick="javascript:location.href='<?=base_url("usuarios/index")?>'" class="btn btn-danger">Cancelar</button>
	<?=form_close();?>
</div>