<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('motoristas')?>">Motoristas</a></li>
	  <li class="active">Editar Motorista</li>  
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
	<?=form_open('motoristas/atualizar', array('role' => 'form'));?>
	  <input type="hidden" name="id" value="<?=$motorista->id?>" />	  
	  <div class="form-group <?php echo form_error('nome') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Nome Completo</label>
	    <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?=$motorista->nome?>" />
	  </div>
	  <div class="form-group <?php echo form_error('documento') != '' ? 'has-error' : '' ?>">
	    <label for="documento">Número do Documento</label>
	    <input type="text" class="form-control" id="documento" name="documento" placeholder="Ex.: 1111111111111-01" value="<?=$motorista->documento?>" />
	  </div>
	  <div class="form-group <?php echo form_error('categoria') != '' ? 'has-error' : '' ?>">
	    <label for="categoria">Categoria da Cateira</label>
	    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Ex.: Categoria C" value="<?=$motorista->categoria?>" />
	  </div>	   
	  <hr />
	  <button type="submit" class="btn btn-primary button-salvar">Salvar</button>
	  <button type="button" onclick="javascript:location.href='<?=base_url("motoristas/index")?>'" class="btn btn-danger">Cancelar</button>
	<?=form_close();?>
</div>