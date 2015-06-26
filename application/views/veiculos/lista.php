<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li class="active">Ve&iacute;culos</li>  
	</ol>
</div>

<div class='row'>
	<?=form_open('veiculos/resultado_busca', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));?>
	  <div class="form-group">	   
	    <input type="search" class="form-control campo-busca" id="q" value="<?=$q?>" placeholder="digite o nome, marca, modelo ou ano" name="q">	  	
	  </div>
	  <button type="submit" class="btn btn-default button-pesquisar">Pesquisar</button>
	  <button type="button" class="btn btn-success button-adicionar" onclick="location.href='<?=base_url('veiculos/criar')?>'">Adicionar Ve&iacute;culo</button>
	<?=form_close();?>
</div>

<br />

<div class="row">
<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Placa</th>          
          <th>Marca</th>
          <th>Modelo</th>
          <th>Ano</th>                    
          <th>Motorista</th>
          <th>Setor de Uso</th>
          <th></th>
        </tr>
      </thead>
      <tbody>      	
      	<?php foreach($veiculos as $veiculo): ?>
        <tr>
          <td><?php echo $veiculo->id; ?></td>
          <td>
          	<a href="<?php echo base_url("veiculos/editar") . "/" . $veiculo->id;?>">
          		<?php echo $veiculo->placa; ?>
          	</a>          		
          </td>
          <td>            
              <?php echo $veiculo->marca; ?>            
          </td>                 
          <td>            
              <?php echo $veiculo->modelo; ?>            
          </td>                 
          <td>            
              <?php echo $veiculo->ano; ?>            
          </td>                 
          <td>
            <?php if($veiculo->Motorista()->nome != "Sem Motorista") : ?>   
              <a href="<?php echo base_url("motoristas/editar") . "/" . $veiculo->Motorista()->id;?>">
                <img src="<?php echo base_url('assets/img/icons/user.png')?>" width="16" />
                <?php echo $veiculo->Motorista()->nome; ?>            
              </a>
            <?php else :?>
              <?php echo $veiculo->Motorista()->nome; ?>            
            <?php endif; ?>
          </td> 
          <td>
            <?php if($veiculo->Setor()->nome != "Sem Setor definido") : ?>   
              <a href="<?php echo base_url("motoristas/editar") . "/" . $veiculo->Motorista()->id;?>">   
                <img src="<?php echo base_url('assets/img/icons/brick.png')?>" width="16" />             
                <?php echo $veiculo->Setor()->nome; ?>            
              </a>
            <?php else :?>
              <?php echo $veiculo->Setor()->nome; ?>            
            <?php endif; ?>
          </td>                 
          <td>          	
            <a href="<?php echo base_url("veiculos/excluir") . "/" . $veiculo->id;?>" title="Excluir" class="btn btn-default button-delete">Apagar</a>            
          </td>
        </tr>            
        <?php endforeach; ?>   
      </tbody>
    </table>
 </div>

<div class="row text-center">
	<?php echo $paginacao; ?>
</div>