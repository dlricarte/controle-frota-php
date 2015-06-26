<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('clientes')?>">Clientes</a></li>
	  <li class="active">Editar cliente</li>  
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
	<?=form_open('clientes/atualizar', array('role' => 'form'));?>
	  <input type="hidden" name="id" value="<?=$cliente->cli_id?>" />	  
	  <div class="form-group <?php echo form_error('razao_social') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Raz&atilde;o Social</label>
	    <input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="" value="<?=$cliente->razao_social?>" />
	  </div>
	  <div class="form-group <?php echo form_error('nome_fantasia') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Nome Fantasia</label>
	    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" placeholder="" value="<?=$cliente->nome_fantasia?>" />
	  </div> 
	  <div class="form-group <?php echo form_error('cnpj') != '' ? 'has-error' : '' ?>">
	    <label for="nome">CNPJ</label>
	    <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="00.000.000/0001-00" value="<?=$cliente->cnpj?>" />
	  </div> 	  
	  <div class="form-group <?php echo form_error('inscricao_estadual') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Inscri&ccedil;&atilde;o Estadual</label>
	    <input type="text" class="form-control" id="inscricao_estadual" name="inscricao_estadual" placeholder="" value="<?=$cliente->inscricao_estadual?>" />
	  </div>
	  <div class="form-group <?php echo form_error('inscricao_municipal') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Inscri&ccedil;&atilde;o Municipal</label>
	    <input type="text" class="form-control" id="inscricao_municipal" name="inscricao_municipal" placeholder="" value="<?=$cliente->inscricao_municipal?>" />
	  </div>
	  <div class="form-group <?php echo form_error('endereco') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Endere&ccedil;o</label>
	    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="" value="<?=$cliente->endereco?>" />
	  </div>
	  <div class="form-group <?php echo form_error('cidade') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Cidade</label>
	    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" value="<?=$cliente->cidade?>" />
	  </div> 

	  <div class="form-group" style="width:20%" >
	    <label for="estado">Estado</label>
	    <select class="form-control" name="estado">
    		<option <?= $cliente->estado == "AC" ? "selected" : "" ?> value="AC">Acre</option>
		    <option <?= $cliente->estado == "AL" ? "selected" : "" ?> value="AL">Alagoas</option>
		    <option <?= $cliente->estado == "AM" ? "selected" : "" ?> value="AM">Amazonas</option>
		    <option <?= $cliente->estado == "AP" ? "selected" : "" ?> value="AP">Amap&aacute;</option>
		    <option <?= $cliente->estado == "BA" ? "selected" : "" ?> value="BA">Bahia</option>
		    <option <?= $cliente->estado == "CE" ? "selected" : "" ?> value="CE">Cear&aacute;</option>
		    <option <?= $cliente->estado == "DF" ? "selected" : "" ?> value="DF">Distrito Federal</option>
		    <option <?= $cliente->estado == "ES" ? "selected" : "" ?> value="ES">Espirito Santo</option>
		    <option <?= $cliente->estado == "ES" ? "selected" : "" ?> value="ES">Goi&aacute;s</option>
		    <option <?= $cliente->estado == "MA" ? "selected" : "" ?> value="MA">Maranh&atilde;o</option>
		    <option <?= $cliente->estado == "MA" ? "selected" : "" ?> value="MA">Minas Gerais</option>
		    <option <?= $cliente->estado == "MS" ? "selected" : "" ?> value="MS">Mato Grosso do Sul</option>
		    <option <?= $cliente->estado == "MT" ? "selected" : "" ?> value="MT">Mato Grosso</option>
		    <option <?= $cliente->estado == "PA" ? "selected" : "" ?> value="PA">Par&aacute;</option>
		    <option <?= $cliente->estado == "PB" ? "selected" : "" ?> value="PB">Paraíba</option>
		    <option <?= $cliente->estado == "PE" ? "selected" : "" ?> value="PE">Pernambuco</option>
		    <option <?= $cliente->estado == "PI" ? "selected" : "" ?> value="PI">Piauí</option>
		    <option <?= $cliente->estado == "PR" ? "selected" : "" ?> value="PR">Paran&aacute;</option>
		    <option <?= $cliente->estado == "RJ" ? "selected" : "" ?> value="RJ">Rio de Janeiro</option>
		    <option <?= $cliente->estado == "RN" ? "selected" : "" ?> value="RN">Rio Grande do Norte</option>
		    <option <?= $cliente->estado == "RO" ? "selected" : "" ?> value="RO">Rondônia</option>
		    <option <?= $cliente->estado == "RR" ? "selected" : "" ?> value="RR">Roraima</option>
		    <option <?= $cliente->estado == "RS" ? "selected" : "" ?> value="RS">Rio Grande do Sul</option>
		    <option <?= $cliente->estado == "SC" ? "selected" : "" ?> value="SC">Santa Catarina</option>
		    <option <?= $cliente->estado == "SE" ? "selected" : "" ?> value="SE">Sergipe</option>
		    <option <?= $cliente->estado == "SP" ? "selected" : "" ?> value="SP">São Paulo</option>
		    <option <?= $cliente->estado == "TO" ? "selected" : "" ?> value="TO">Tocantins</option>
    	</select>	    
	  </div> 
	  <div class="form-group <?php echo form_error('cep') != '' ? 'has-error' : '' ?>">
	    <label for="nome">CEP</label>
	    <input type="text" style="width:20%" class="form-control" id="cep" name="cep" placeholder="00000-000" value="<?=$cliente->cep?>" />
	  </div>

	  <div class="form-group <?php echo form_error('ddd_telefone') != '' || form_error('telefone') != '' ? 'has-error' : '' ?>">
	    <label for="nome" style="display:block;">Telefone</label>
	    <input type="text" class="form-control ddd-telefone" id="ddd_telefone" name="ddd_telefone" placeholder="DDD" value="<?=$cliente->ddd_telefone?>" />
	    <input type="text" class="form-control telefone" id="telefone" name="telefone" placeholder="Telefone" value="<?=$cliente->telefone?>" />
	    <input type="text" class="form-control telefone" id="ramal_telefone" name="ramal_telefone" placeholder="Ramal" value="<?=$cliente->ramal_telefone?>" />
	  </div>

	  <div class="form-group <?php echo form_error('ddd_fax') != '' || form_error('fax') != '' ? 'has-error' : '' ?>">
	    <label for="nome" style="display:block;">Fax</label>
	    <input type="text" class="form-control ddd-telefone" id="ddd_fax" name="ddd_fax" placeholder="DDD" value="<?=$cliente->ddd_fax?>" />
	    <input type="text" class="form-control telefone" id="fax" name="fax" placeholder="Fax" value="<?=$cliente->fax?>" />
	    <input type="text" class="form-control telefone" id="ramal_fax" name="ramal_fax" placeholder="Ramal" value="<?=$cliente->ramal_fax?>" />
	  </div>

	  <div class="form-group <?php echo form_error('email') != '' ? 'has-error' : '' ?>">
	    <label for="nome">E-mail</label>
	    <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?=$cliente->email?>" />
	  </div> 
	  <div class="form-group <?php echo form_error('contato') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Contato</label>
	    <input type="text" class="form-control" id="contato" name="contato" placeholder="" value="<?=$cliente->contato?>" />
	  </div> 
	  
	  <div class="form-group <?php echo form_error('observacoes') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Observa&ccedil;&otilde;es</label>
	    <textarea class="form-control" name="observacoes" rows="7"><?=$cliente->observacoes?></textarea>
	  </div>  
	  <hr />
	  <button type="submit" class="btn btn-primary button-salvar">Salvar</button>
	  <button type="button" onclick="javascript:location.href='<?=base_url("clientes/index")?>'" class="btn btn-danger">Cancelar</button>
	<?=form_close();?>
</div>