<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('ativos')?>">Ativos</a></li>
	  <li class="active">Editar Ativo</li>  
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
	<h2>Edi&ccedil;&atilde;o de Ativo</h2>
	<hr />
	<?=form_open('ativo/atualizar', array('role' => 'form'));?>
	  <input type="hidden" name="id" value="<?=$ativo->id?>" />	  
	  <div class="form-group">
	    <label for="nome">Nome da Ativo</label>
	    <input type="text" class="form-control" id="nome" value="<?=$ativo->nome?>" name="nome" placeholder="">
	  </div>
	  <div class="form-group">
	  	<label for="categoria_id">Categoria</label>	    
	    <select class="form-control" name="categoria_id">
	    <?php foreach($categorias as $categoria) : ?>
		  <option value="<?php echo $categoria->id;?>"><?php echo $categoria->nome;?></option>		  
		<?php endforeach; ?>
		</select>
	  </div>
	  <div class="form-group">
	  	<label for="grau_risco_id">Grau de Risco</label>	    
	    <input class="form-control" name="grau_risco_id" id="grau_de_risco" type="text" placeholder="Moderado" disabled>
	  </div>	  
	  <hr />
	  <button type="submit" class="btn btn-primary">Salvar</button>
	  <button type="button" onclick="javascript:location.href='<?=base_url('ativos/movimentacao') . "/" . $ativo->id;?>'" class="btn btn-success">Aportes</button>
	  <button type="button" onclick="javascript:location.href='<?=base_url("ativos/index")?>'" class="btn btn-danger">Cancelar</button>
	<?=form_close();?>	
		 
</div>