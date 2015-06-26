
<br /><br />
<div class="row col-sm-3">&nbsp;</div>
<div class="row col-sm-6">
  <?=form_open('login/recuperar_senha', array('role' => 'form', 'class' => 'form-recuperar-senha'));?> 
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
   <div class="form-group">
      <label class="" for="email">Endereço de Email Cadastrado</label>
      <input type="email" class="form-control" placeholder="Email" name="email" id="email" required autofocus>
   </div> 
   <button class="btn btn-lg btn-primary btn-block" type="submit">Recuperar Senha</button>
   <br />
   <a href="<?php echo base_url("login");?>">Voltar para Login</a>
  <?=form_close();?>
</div>