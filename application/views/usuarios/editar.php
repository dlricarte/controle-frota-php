<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('usuarios')?>">Usu&aacute;rios</a></li>
	  <li class="active">Editar Usu&aacute;rio</li>  
	</ol>
</div>


<?php if(validation_errors() || isset($erro)) : ?>
<div class='row'>
	<div class="alert alert-danger">
		<?php echo validation_errors(); ?>
		<?php if(isset($erro)) : ?>
		<?php echo $erro; ?>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>

<div class='row'>
	<?=form_open('usuarios/atualizar', array('role' => 'form'));?>
	  <input type="hidden" name="id" value="<?=$usuario->id?>" />	  
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nome</label>
	    <input type="text" class="form-control" id="nome" value="<?=$usuario->nome?>" name="nome" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email</label>
	    <input type="email" class="form-control" id="email" name="email" value="<?=$usuario->email?>" placeholder="email@example.com">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Confirme o e-mail</label>
	    <input type="email" class="form-control" id="confirme_email" value="<?=$usuario->email?>" name="confirme_email" placeholder="email@example.com">
	  </div>	  	  
	  <button type="submit" class="btn btn-primary button-salvar">Atualizar Dados</button>  
	  <hr />
	  <?=form_close();?>
	  <?=form_open('usuarios/atualizar_senha', array('role' => 'form'));?>
	  <input type="hidden" name="id" value="<?=$usuario->id?>" />	  
	  <div class="form-group">
	    <label for="exampleInputEmail1">Senha Atual</label>
	    <input type="password" class="form-control" id="senha_antiga" name="senha_antiga" placeholder="senha">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nova Senha</label>
	    <input type="password" class="form-control" id="senha" name="senha" placeholder="senha">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Confirme a nova senha</label>
	    <input type="password" class="form-control" id="confirme_senha" name="confirme_senha" placeholder="senha">
	  </div>	  
	  <hr />
	  <button type="submit" class="btn btn-primary button-salvar">Atualizar Senha</button>
	  <button type="button" onclick="javascript:location.href='<?=base_url("usuarios/index")?>'" class="btn btn-danger">Cancelar</button>
	  <?=form_close();?>
</div>