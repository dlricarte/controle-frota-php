<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('veiculos')?>">Ve&iacute;culos</a></li>
	  <li class="active">Editar Ve&iacute;culo</li>  
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
	<?=form_open('veiculos/atualizar', array('role' => 'form'));?>
	  <input type="hidden" name="id" value="<?=$veiculo->id?>" />	  
	  <div class="form-group <?php echo form_error('marca') != '' ? 'has-error' : '' ?>">
	    <label for="marca">Marca</label>
	    <input type="text" class="form-control" id="marca" name="marca" placeholder="Ex.: FIAT" value="<?=$veiculo->marca?>" />
	  </div>
	  <div class="form-group <?php echo form_error('modelo') != '' ? 'has-error' : '' ?>">
	    <label for="modelo">Modelo</label>
	    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ex.: Palio" value="<?=$veiculo->modelo?>" />
	  </div>
	  <div class="form-group <?php echo form_error('ano') != '' ? 'has-error' : '' ?>">
	    <label for="ano">Ano</label>
	    <input type="number" class="form-control" min="1900" step="1" id="ano" name="ano" placeholder="Ex.: 1999" value="<?=$veiculo->ano?>" />
	  </div>
	  <div class="form-group <?php echo form_error('placa') != '' ? 'has-error' : '' ?>">
	    <label for="placa">Placa</label>
	    <input type="text" class="form-control" id="placa" name="placa" placeholder="Ex.: ABC-1234" value="<?=$veiculo->placa?>" />
	  </div>
	  <div class="form-group <?php echo form_error('km') != '' ? 'has-error' : '' ?>">
	    <label for="placa">Quilometragem (KM)</label>
	    <input type="text" class="form-control" id="km" name="km" placeholder="45856" value="<?=$veiculo->km?>">
	  </div>
	  <div class="form-group">
	    <label for="id_motorista">Motorista</label>
	    	<select class="form-control" name="id_motorista">
	    		<option value="0">Sem Motorista</option>
	    		<?php foreach($motoristas as $motorista):?>
	    			<?php if($motorista->id == $veiculo->Motorista()->id) : ?>
	    				<option selected value="<?=$motorista->id?>"><?=$motorista->nome?></option>
	    			<?php else : ?>
	    				<option value="<?=$motorista->id?>"><?=$motorista->nome?></option>
	    			<?php endif; ?>
	    		<?php endforeach; ?>
	    	</select>
	  </div>
	   <div class="form-group">
	    <label for="id_setor">Setores</label>
	    	<select class="form-control" name="id_setor">
	    		<option value="0">Sem Setor Definido</option>
	    		<?php foreach($setores as $setor):?>
	    			<?php if($setor->id == $veiculo->Setor()->id) : ?>
	    				<option selected value="<?=$setor->id?>"><?=$setor->nome?></option>
	    			<?php else : ?>
	    				<option value="<?=$setor->id?>"><?=$setor->nome?></option>
	    			<?php endif; ?>
	    		<?php endforeach; ?>
	    	</select>
	  </div>	   
	  <hr />
	  <button type="submit" class="btn btn-primary button-salvar">Salvar</button>
	  <button type="button" onclick="javascript:location.href='<?=base_url("veiculos/index")?>'" class="btn btn-danger">Cancelar</button>
	<?=form_close();?>
</div>