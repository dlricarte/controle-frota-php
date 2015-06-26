<div class='row hidden-print'>
	<ol class="breadcrumb">
	  <li>Home</li>
	  <li class="active">Lista de Ve&iacute;culos</li>  
	</ol>
</div>

<div class='row'>
  <?=form_open('veiculos/imprimir_lista', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));?>
    <div class="form-group">     
      <input type="search" class="form-control campo-busca" id="q" value="<?=$q?>" placeholder="digite o nome, marca, modelo ou ano" name="q">      
    </div>
    <button type="submit" class="btn btn-default button-pesquisar">Pesquisar</button>
    <button type="button" class="btn btn-success button-adicionar" onclick="location.href='<?=base_url('veiculos/criar')?>'">Adicionar Ve&iacute;culo</button>
  <?=form_close();?>
</div>

<div class="row">
  <h2>Lista de Ve&iacute;culos</h2>
  <hr />
  <button type="button" class="btn btn-default button-action button-imprimir hidden-print" onclick="window.print();">Imprimir</button>  
  <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Placa</th>          
          <th>Marca</th>
          <th>Modelo</th>
          <th>Ano</th>                    
          <th>Motorista</th>
          <th>Setor de Uso</th>
        </tr>
      </thead>
      <tbody>      	
      	<?php foreach($veiculos as $veiculo): ?>
        <tr>
          <td><?php echo $veiculo->id; ?></td>
          <td>          	
          		<?php echo $veiculo->placa; ?>          	
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
            <?php if($veiculo->Motorista()->nome ==  "Sem Motorista") : ?>
              ---
            <?php else :?>
              <?php echo $veiculo->Motorista()->nome; ?>
            <?php endif; ?>
          </td>
          <td>          
            <?php if($veiculo->Setor()->nome ==  "Sem Setor definido") : ?>
              ---
            <?php else :?>
              <?php echo $veiculo->Setor()->nome; ?>
            <?php endif; ?>
          </td>                           
        </tr>            
        <?php endforeach; ?> 
        <tr>
          <td colspan="5"></td>
          <td class="text-right">
            <label>Total de Ve&iacute;culos :</label> <?=sizeof($veiculos);?>
          </td>
        </tr>  
      </tbody>
    </table>
 </div>