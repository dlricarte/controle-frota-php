<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li class="active">Clientes</li>  
	</ol>
</div>

<div class='row'>
	<?=form_open('clientes/resultado_busca', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));?>
	  <div class="form-group">	   
	    <input type="search" class="form-control campo-busca" id="q" value="<?=$q?>" placeholder="digite o nome fantasia ou raz&atilde;o social" name="q">	  	
	  </div>
	  <button type="submit" class="btn btn-default button-pesquisar">Pesquisar</button>
    <button type="button" class="btn btn-success button-adicionar" onclick="location.href='<?=base_url('clientes/criar')?>'">Adicionar Cliente</button>
	<?=form_close();?>
</div>

<br />

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
      	<?php foreach($clientes as $cliente): ?>
        <tr>
          <td><?php echo $cliente->cli_id; ?></td>
          <td>
          	<a href="<?php echo base_url("clientes/editar") . "/" . $cliente->cli_id;?>">
          		<?php echo trim($cliente->nome_fantasia); ?>
          	</a>          		
          </td>  
           <td>
              <?php echo trim($cliente->razao_social); ?>
          </td>
          <td>
              <?php if($cliente->ddd_telefone) : ?>
                <?php echo "(" . trim($cliente->ddd_telefone) . ")"; ?>
              <?php endif; ?>
              
              <?php if($cliente->telefone) : ?>
                <?php echo trim($cliente->telefone); ?>
              <?php endif; ?>

              <?php if($cliente->ramal_telefone) : ?>
                <?php echo " r: " . trim($cliente->ramal_telefone); ?>
              <?php endif; ?>
          </td>
          <td>
              <?php if($cliente->ddd_fax) : ?>
                <?php echo "(" . trim($cliente->ddd_fax) . ")"; ?>
              <?php endif; ?>
              
              <?php if($cliente->fax) : ?>
                <?php echo trim($cliente->fax); ?>
              <?php endif; ?>

              <?php if($cliente->ramal_fax) : ?>
                <?php echo " r: " . trim($cliente->ramal_fax); ?>
              <?php endif; ?>
          </td>
          <td>
              <?php echo trim($cliente->contato); ?>
          </td>          
          <td>          	
            <a href="<?php echo base_url("clientes/excluir") . "/" . $cliente->cli_id;?>" title="Excluir" class="btn btn-default button-delete">Apagar</a>
          </td>
        </tr>            
        <?php endforeach; ?>   
      </tbody>
    </table>
 </div>

<div class="row text-center">
	<?php echo $paginacao; ?>
</div>