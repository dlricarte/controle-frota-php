<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li class="active">Setores</li>  
	</ol>
</div>

<div class='row'>
	<?=form_open('setores/resultado_busca', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));?>
	  <div class="form-group">	   
	    <input type="search" class="form-control campo-busca" id="q" value="<?=$q?>" placeholder="digite o nome" name="q">	  	
	  </div>
	  <button type="submit" class="btn btn-default button-pesquisar">Pesquisar</button>
    <button type="button" class="btn btn-success button-adicionar" onclick="location.href='<?=base_url('setores/criar')?>'">Adicionar Setor</button>
	<?=form_close();?>
</div>

<br />

<div class="row">
<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>         
          <th></th>
        </tr>
      </thead>
      <tbody>      	
      	<?php foreach($setores as $setor): ?>
        <tr>
          <td><?php echo $setor->id; ?></td>
          <td>
          	<a href="<?php echo base_url("setores/editar") . "/" . $setor->id;?>">
          		<?php echo trim($setor->nome); ?>
          	</a>          		
          </td>                   
          <td>          	
            <a href="<?php echo base_url("setores/excluir") . "/" . $setor->id;?>" title="Excluir" class="btn btn-default button-delete">Apagar</a>
          </td>
        </tr>            
        <?php endforeach; ?>   
      </tbody>
    </table>
 </div>

<div class="row text-center">
	<?php echo $paginacao; ?>
</div>