<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li class="active">Motoristas</li>  
	</ol>
</div>

<div class='row'>
	<?=form_open('motoristas/resultado_busca', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));?>
	  <div class="form-group">	   
	    <input type="search" class="form-control campo-busca" id="q" value="<?=$q?>" placeholder="digite o nome" name="q">	  	
	  </div>
	  <button type="submit" class="btn btn-default button-pesquisar">Pesquisar</button>
    <button type="button" class="btn btn-success button-adicionar" onclick="location.href='<?=base_url('motoristas/criar')?>'">Adicionar Ve&iacute;culo</button>
	<?=form_close();?>
</div>

<br />

<div class="row">
<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>Documento</th>
          <th>Categoria da Cateira</th>
          <th>Ve&iacute;culos</th>
          <th></th>
        </tr>
      </thead>
      <tbody>      	
      	<?php foreach($motoristas as $motorista): ?>
        <tr>
          <td><?php echo $motorista->id; ?></td>
          <td>
          	<a href="<?php echo base_url("motoristas/editar") . "/" . $motorista->id;?>">
          		<?php echo $motorista->nome; ?>
          	</a>          		
          </td>
          <td>            
              <?php echo $motorista->documento; ?>            
          </td>                      
          <td>            
              <?php echo $motorista->categoria; ?>            
          </td>
          <td>
            <?php foreach ($motorista->Veiculos() as $veiculo) : ?>              
              <a href=<?php echo base_url("veiculos/editar") . "/" . $veiculo->id?>>
              <img src="<?php echo base_url('assets/img/icons/car.png')?>" width="16" />       
              <?php if($veiculo->marca != "") : ?>
                <?php echo $veiculo->marca . " "; ?>
              <?php endif; ?>              
              <?php echo $veiculo->modelo; ?>
              <?php if($veiculo->ano != "") : ?>
                <?php echo "(" . $veiculo->ano . ")"; ?>
              <?php endif; ?>  
              <?php if($veiculo->placa != "") : ?>
                <?php echo " : " . $veiculo->placa; ?>
              <?php endif; ?>               
              </a><br />              
            <?php endforeach; ?>
          </td>                      
          <td>          	
            <a href="<?php echo base_url("motoristas/excluir") . "/" . $motorista->id;?>" title="Excluir" class="btn btn-default button-delete">Apagar</a>            
          </td>
        </tr>            
        <?php endforeach; ?>   
      </tbody>
    </table>
 </div>

<div class="row text-center">
	<?php echo $paginacao; ?>
</div>