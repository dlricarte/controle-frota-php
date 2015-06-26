<div class="row col-sm-3"></div>
<div class="row col-sm-6">
	<?=form_open('login/autentica', array('role' => 'form', 'class' => 'form-signin'));?>
	  <h2 class="form-signin-heading">Login</h2>
	  
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

	  <input type="email" class="form-control" placeholder="Email" name="email" id="email" required autofocus>
	  <input type="password" class="form-control" placeholder="Senha" id="senha" name="senha" required> 
	  <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
	  <br />
	  <label>
	      <a href="<?php echo base_url("login/esqueci_minha_senha");?>">Esqueci minha senha</a>
	  </label>
	<?=form_close();?>
</div>