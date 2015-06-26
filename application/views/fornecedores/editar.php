<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('fornecedores')?>">Fornecedores</a></li>
	  <li class="active">Editar Fornecedor</li>  
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
	<?=form_open('fornecedores/atualizar', array('role' => 'form'));?>
	  <input type="hidden" name="id" value="<?=$fornecedor->for_id?>" />	  
	  <div class="form-group <?php echo form_error('razao_social') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Raz&atilde;o Social</label>
	    <input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="" value="<?=$fornecedor->razao_social?>" />
	  </div>
	  <div class="form-group <?php echo form_error('nome_fantasia') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Nome Fantasia</label>
	    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" placeholder="" value="<?=$fornecedor->nome_fantasia?>" />
	  </div> 
	  <div class="form-group <?php echo form_error('cnpj') != '' ? 'has-error' : '' ?>">
	    <label for="nome">CNPJ</label>
	    <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="00.000.000/0001-00" value="<?=$fornecedor->cnpj?>" />
	  </div> 	  
	  <div class="form-group <?php echo form_error('inscricao_estadual') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Inscri&ccedil;&atilde;o Estadual</label>
	    <input type="text" class="form-control" id="inscricao_estadual" name="inscricao_estadual" placeholder="" value="<?=$fornecedor->inscricao_estadual?>" />
	  </div>
	  <div class="form-group <?php echo form_error('inscricao_municipal') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Inscri&ccedil;&atilde;o Municipal</label>
	    <input type="text" class="form-control" id="inscricao_municipal" name="inscricao_municipal" placeholder="" value="<?=$fornecedor->inscricao_municipal?>" />
	  </div>
	  <div class="form-group <?php echo form_error('endereco') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Endere&ccedil;o</label>
	    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="" value="<?=$fornecedor->endereco?>" />
	  </div>
	  <div class="form-group <?php echo form_error('cidade') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Cidade</label>
	    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" value="<?=$fornecedor->cidade?>" />
	  </div> 

	  <div class="form-group" style="width:20%" >
	    <label for="estado">Estado</label>
	    <select class="form-control" name="estado">
    		<option <?= $fornecedor->estado == "AC" ? "selected" : "" ?> value="AC">Acre</option>
		    <option <?= $fornecedor->estado == "AL" ? "selected" : "" ?> value="AL">Alagoas</option>
		    <option <?= $fornecedor->estado == "AM" ? "selected" : "" ?> value="AM">Amazonas</option>
		    <option <?= $fornecedor->estado == "AP" ? "selected" : "" ?> value="AP">Amap&aacute;</option>
		    <option <?= $fornecedor->estado == "BA" ? "selected" : "" ?> value="BA">Bahia</option>
		    <option <?= $fornecedor->estado == "CE" ? "selected" : "" ?> value="CE">Cear&aacute;</option>
		    <option <?= $fornecedor->estado == "DF" ? "selected" : "" ?> value="DF">Distrito Federal</option>
		    <option <?= $fornecedor->estado == "ES" ? "selected" : "" ?> value="ES">Espirito Santo</option>
		    <option <?= $fornecedor->estado == "ES" ? "selected" : "" ?> value="ES">Goi&aacute;s</option>
		    <option <?= $fornecedor->estado == "MA" ? "selected" : "" ?> value="MA">Maranh&atilde;o</option>
		    <option <?= $fornecedor->estado == "MA" ? "selected" : "" ?> value="MA">Minas Gerais</option>
		    <option <?= $fornecedor->estado == "MS" ? "selected" : "" ?> value="MS">Mato Grosso do Sul</option>
		    <option <?= $fornecedor->estado == "MT" ? "selected" : "" ?> value="MT">Mato Grosso</option>
		    <option <?= $fornecedor->estado == "PA" ? "selected" : "" ?> value="PA">Par&aacute;</option>
		    <option <?= $fornecedor->estado == "PB" ? "selected" : "" ?> value="PB">Paraíba</option>
		    <option <?= $fornecedor->estado == "PE" ? "selected" : "" ?> value="PE">Pernambuco</option>
		    <option <?= $fornecedor->estado == "PI" ? "selected" : "" ?> value="PI">Piauí</option>
		    <option <?= $fornecedor->estado == "PR" ? "selected" : "" ?> value="PR">Paran&aacute;</option>
		    <option <?= $fornecedor->estado == "RJ" ? "selected" : "" ?> value="RJ">Rio de Janeiro</option>
		    <option <?= $fornecedor->estado == "RN" ? "selected" : "" ?> value="RN">Rio Grande do Norte</option>
		    <option <?= $fornecedor->estado == "RO" ? "selected" : "" ?> value="RO">Rondônia</option>
		    <option <?= $fornecedor->estado == "RR" ? "selected" : "" ?> value="RR">Roraima</option>
		    <option <?= $fornecedor->estado == "RS" ? "selected" : "" ?> value="RS">Rio Grande do Sul</option>
		    <option <?= $fornecedor->estado == "SC" ? "selected" : "" ?> value="SC">Santa Catarina</option>
		    <option <?= $fornecedor->estado == "SE" ? "selected" : "" ?> value="SE">Sergipe</option>
		    <option <?= $fornecedor->estado == "SP" ? "selected" : "" ?> value="SP">São Paulo</option>
		    <option <?= $fornecedor->estado == "TO" ? "selected" : "" ?> value="TO">Tocantins</option>
    	</select>	    
	  </div> 
	  <div class="form-group <?php echo form_error('cep') != '' ? 'has-error' : '' ?>">
	    <label for="nome">CEP</label>
	    <input type="text" style="width:20%" class="form-control" id="cep" name="cep" placeholder="00000-000" value="<?=$fornecedor->cep?>" />
	  </div>

	  <div class="form-group <?php echo form_error('ddd_telefone') != '' || form_error('telefone') != '' ? 'has-error' : '' ?>">
	    <label for="nome" style="display:block;">Telefone</label>
	    <input type="text" class="form-control ddd-telefone" id="ddd_telefone" name="ddd_telefone" placeholder="DDD" value="<?=$fornecedor->ddd_telefone?>" />
	    <input type="text" class="form-control telefone" id="telefone" name="telefone" placeholder="Telefone" value="<?=$fornecedor->telefone?>" />
	    <input type="text" class="form-control telefone" id="ramal_telefone" name="ramal_telefone" placeholder="Ramal" value="<?=$fornecedor->ramal_telefone?>" />
	  </div>

	  <div class="form-group <?php echo form_error('ddd_fax') != '' || form_error('fax') != '' ? 'has-error' : '' ?>">
	    <label for="nome" style="display:block;">Fax</label>
	    <input type="text" class="form-control ddd-telefone" id="ddd_fax" name="ddd_fax" placeholder="DDD" value="<?=$fornecedor->ddd_fax?>" />
	    <input type="text" class="form-control telefone" id="fax" name="fax" placeholder="Fax" value="<?=$fornecedor->fax?>" />
	    <input type="text" class="form-control telefone" id="ramal_fax" name="ramal_fax" placeholder="Ramal" value="<?=$fornecedor->ramal_fax?>" />
	  </div>

	  <div class="form-group <?php echo form_error('email') != '' ? 'has-error' : '' ?>">
	    <label for="nome">E-mail</label>
	    <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?=$fornecedor->email?>" />
	  </div> 
	  <div class="form-group <?php echo form_error('contato') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Contato</label>
	    <input type="text" class="form-control" id="contato" name="contato" placeholder="" value="<?=$fornecedor->contato?>" />
	  </div> 
	  
	  <div class="form-group <?php echo form_error('observacoes') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Observa&ccedil;&otilde;es</label>
	    <textarea class="form-control" name="observacoes" rows="7"><?=$fornecedor->observacoes?></textarea>
	  </div>  
	  <hr />
	  <button type="submit" class="btn btn-primary button-salvar">Salvar</button>
	  <button type="button" onclick="javascript:location.href='<?=base_url("fornecedores/index")?>'" class="btn btn-danger">Cancelar</button>
	<?=form_close();?>
</div>