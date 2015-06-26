
<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li><a href="<?=base_url('clientes')?>">Clientes</a></li>
	  <li class="active">Criar Cliente</li>  
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
	<?=form_open('clientes/salvar', array('role' => 'form'));?>
	  <div class="form-group <?php echo form_error('razao_social') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Raz&atilde;o Social</label>
	    <input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="" value="<?php echo set_value('razao_social'); ?>" />
	  </div>
	  <div class="form-group <?php echo form_error('nome_fantasia') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Nome Fantasia</label>
	    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" placeholder="" value="<?php echo set_value('nome_fantasia'); ?>" />
	  </div> 
	  <div class="form-group <?php echo form_error('cnpj') != '' ? 'has-error' : '' ?>">
	    <label for="nome">CNPJ</label>
	    <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="00.000.000/0001-00" value="<?php echo set_value('cnpj'); ?>" />
	  </div> 	  
	  <div class="form-group <?php echo form_error('inscricao_estadual') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Inscri&ccedil;&atilde;o Estadual</label>
	    <input type="text" class="form-control" id="inscricao_estadual" name="inscricao_estadual" placeholder="" value="<?php echo set_value('inscricao_estadual'); ?>" />
	  </div>
	  <div class="form-group <?php echo form_error('inscricao_municipal') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Inscri&ccedil;&atilde;o Municipal</label>
	    <input type="text" class="form-control" id="inscricao_municipal" name="inscricao_municipal" placeholder="" value="<?php echo set_value('inscricao_municipal'); ?>" />
	  </div>
	  <div class="form-group <?php echo form_error('endereco') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Endere&ccedil;o</label>
	    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="" value="<?php echo set_value('endereco'); ?>" />
	  </div>
	  <div class="form-group <?php echo form_error('cidade') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Cidade</label>
	    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="" value="<?php echo set_value('cidade'); ?>" />
	  </div> 

	  <div class="form-group" style="width:20%" >
	    <label for="estado">Estado</label>
	    <select class="form-control" name="estado">
    		<option value="AC">Acre</option>
		    <option value="AL">Alagoas</option>
		    <option value="AM">Amazonas</option>
		    <option value="AP">Amap&aacute;</option>
		    <option value="BA">Bahia</option>
		    <option value="CE">Cear&aacute;</option>
		    <option value="DF">Distrito Federal</option>
		    <option value="ES">Espirito Santo</option>
		    <option value="GO">Goi&aacute;s</option>
		    <option value="MA">Maranh&atilde;o</option>
		    <option value="MG">Minas Gerais</option>
		    <option value="MS">Mato Grosso do Sul</option>
		    <option value="MT">Mato Grosso</option>
		    <option value="PA">Par&aacute;</option>
		    <option value="PB">Paraíba</option>
		    <option value="PE">Pernambuco</option>
		    <option value="PI">Piauí</option>
		    <option value="PR">Paran&aacute;</option>
		    <option value="RJ">Rio de Janeiro</option>
		    <option value="RN">Rio Grande do Norte</option>
		    <option value="RO">Rondônia</option>
		    <option value="RR">Roraima</option>
		    <option value="RS">Rio Grande do Sul</option>
		    <option value="SC">Santa Catarina</option>
		    <option value="SE">Sergipe</option>
		    <option value="SP">São Paulo</option>
		    <option value="TO">Tocantins</option>
    	</select>	    
	  </div> 
	  <div class="form-group <?php echo form_error('cep') != '' ? 'has-error' : '' ?>">
	    <label for="nome">CEP</label>
	    <input type="text" style="width:20%" class="form-control" id="cep" name="cep" placeholder="00000-000" value="<?php echo set_value('cep'); ?>" />
	  </div>

	  <div class="form-group <?php echo form_error('ddd_telefone') != '' || form_error('telefone') != '' ? 'has-error' : '' ?>">
	    <label for="nome" style="display:block;">Telefone</label>
	    <input type="text" class="form-control ddd-telefone" id="ddd_telefone" name="ddd_telefone" placeholder="DDD" value="<?php echo set_value('ddd_telefone'); ?>" />
	    <input type="text" class="form-control telefone" id="telefone" name="telefone" placeholder="Telefone" value="<?php echo set_value('telefone'); ?>" />
	    <input type="text" class="form-control telefone" id="ramal_telefone" name="ramal_telefone" placeholder="Ramal" value="<?php echo set_value('ramal_telefone'); ?>" />
	  </div>

	  <div class="form-group <?php echo form_error('ddd_fax') != '' || form_error('fax') != '' ? 'has-error' : '' ?>">
	    <label for="nome" style="display:block;">Fax</label>
	    <input type="text" class="form-control ddd-telefone" id="ddd_fax" name="ddd_fax" placeholder="DDD" value="<?php echo set_value('ddd_fax'); ?>" />
	    <input type="text" class="form-control telefone" id="fax" name="fax" placeholder="Fax" value="<?php echo set_value('fax'); ?>" />
	    <input type="text" class="form-control telefone" id="ramal_fax" name="ramal_fax" placeholder="Ramal" value="<?php echo set_value('ramal_fax'); ?>" />
	  </div>

	  <div class="form-group <?php echo form_error('email') != '' ? 'has-error' : '' ?>">
	    <label for="nome">E-mail</label>
	    <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?php echo set_value('email'); ?>" />
	  </div> 
	  <div class="form-group <?php echo form_error('contato') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Contato</label>
	    <input type="text" class="form-control" id="contato" name="contato" placeholder="" value="<?php echo set_value('contato'); ?>" />
	  </div> 
	  
	  <div class="form-group <?php echo form_error('observacoes') != '' ? 'has-error' : '' ?>">
	    <label for="nome">Observa&ccedil;&otilde;es</label>
	    <textarea class="form-control" name="observacoes" rows="7"><?php echo set_value('observacoes'); ?></textarea>
	  </div>  
	  <hr />
	  <button type="submit" class="btn btn-primary button-salvar">Salvar</button>
	  <button type="button" onclick="javascript:location.href='<?=base_url("clientes/index")?>'" class="btn btn-danger">Cancelar</button>
	<?=form_close();?>
</div>