
<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('setores')?>">setores</a></li>
	  <li class="active">Criar Setor</li>  
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
	<?=form_open('setores/salvar', array('role' => 'form'));?>
	  <div class="form-group <?php echo form_error('razao_social') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Nome</label>
	    <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?php echo set_value('nome'); ?>" />
	  </div>	  
	  <hr />
	  <button type="submit" class="btn btn-primary button-salvar">Salvar</button>
	  <button type="button" onclick="javascript:location.href='<?=base_url("setores/index")?>'" class="btn btn-danger">Cancelar</button>
	<?=form_close();?>
</div>