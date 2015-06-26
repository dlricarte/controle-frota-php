<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li class="active">Fornecedores</li>  
	</ol>
</div>

<div class='row'>
	<?=form_open('fornecedores/resultado_busca', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));?>
	  <div class="form-group">	   
	    <input type="search" class="form-control campo-busca" id="q" value="<?=$q?>" placeholder="digite o nome fantasia ou raz&atilde;o social" name="q">	  	
	  </div>
	  <button type="submit" class="btn btn-default button-pesquisar">Pesquisar</button>
    <button type="button" class="btn btn-success button-adicionar" onclick="location.href='<?=base_url('fornecedores/criar')?>'">Adicionar Fornecedor</button>
	<?=form_close();?>
</div>

<br />

<?php if(isset($erro) && !empty($erro)) : ?>
<div class="row">
	<div class="alert alert-danger text-center" role="alert"><?php echo $erro;?></div>
</div>
<?php endif; ?>

<div class="row">
<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome Fantasia</th>
          <th>Raz&atilde;o Social</th>
          <th>Telefone</th>
          <th>Fax</th>
          <th>Contato</th>
          <th></th>
        </tr>
      </thead>
      <tbody>      	
      	<?php foreach($fornecedores as $fornecedor): ?>
        <tr>
          <td><?php echo $fornecedor->for_id; ?></td>
          <td>
          	<a href="<?php echo base_url("fornecedores/editar") . "/" . $fornecedor->for_id;?>">
          		<?php echo trim($fornecedor->nome_fantasia); ?>
          	</a>          		
          </td>  
           <td>
              <?php echo trim($fornecedor->razao_social); ?>
          </td>
          <td>
              <?php if($fornecedor->ddd_telefone) : ?>
                <?php echo "(" . trim($fornecedor->ddd_telefone) . ")"; ?>
              <?php endif; ?>
              
              <?php if($fornecedor->telefone) : ?>
                <?php echo trim($fornecedor->telefone); ?>
              <?php endif; ?>

              <?php if($fornecedor->ramal_telefone) : ?>
                <?php echo " r: " . trim($fornecedor->ramal_telefone); ?>
              <?php endif; ?>
          </td>
          <td>
              <?php if($fornecedor->ddd_fax) : ?>
                <?php echo "(" . trim($fornecedor->ddd_fax) . ")"; ?>
              <?php endif; ?>
              
              <?php if($fornecedor->fax) : ?>
                <?php echo trim($fornecedor->fax); ?>
              <?php endif; ?>

              <?php if($fornecedor->ramal_fax) : ?>
                <?php echo " r: " . trim($fornecedor->ramal_fax); ?>
              <?php endif; ?>
          </td>
          <td>
              <?php echo trim($fornecedor->contato); ?>
          </td>          
          <td>          	
            <a href="<?php echo base_url("fornecedores/excluir") . "/" . $fornecedor->for_id;?>" title="Excluir" class="btn btn-default button-delete">Apagar</a>
          </td>
        </tr>            
        <?php endforeach; ?>   
      </tbody>
    </table>
 </div>

<div class="row text-center">
	<?php echo $paginacao; ?>
</div>