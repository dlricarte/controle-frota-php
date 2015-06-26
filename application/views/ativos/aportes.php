<div class='row'>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('home')?>">Home</a></li>
    <li><a href="<?=base_url('ativos')?>">Ativos</a></li>
    <li class="active">Movimenta&ccedil;&atilde;o</li>  
  </ol>
</div>

<div class='row'>
 <table class="table table-bordered">
      <thead>
        <tr class="warning">
          <th>Ativo</th>
          <th>Categoria</th>
          <th>Grau de Risco</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>FIC FIA Golden Ultra Profit Moderate Premium</td>
            <td>Fundo Cambial</td>
            <td>Moderado</td>
        </tr>
      </tbody>
  </table>

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
   <h2>Aportes / Retiradas</h2>
   <hr />
	 <?=form_open('ativo/nova_movimentacao', array('role' => 'form', 'class' => 'form-inline'));?>	 
	  <div class="form-group">	    
	    <div class="input-group" style="width: 220px;">
	    	<div class="input-group-addon">Data</div>
	    	<input type="text" class="form-control" name="data_movimentacao" id="data_movimentacao" />
		</div>
	  </div>

	  <div class="form-group">	    
	  	<div class="input-group" style="width: 220px;margin-left:25px;">
	  		<div class="input-group-addon">Tipo</div>
		    <select class="form-control" name="tipo_movimentacao">
			  <option value="Aporte">Aporte</option>
			  <option value="Retirada">Retirada</option>		  
			</select>
		</div>
	  </div>

	  <div class="form-group">	   		  	   
	  	<div class="input-group" style="width: 220px;margin-left:25px;">
	    	<div class="input-group-addon">R$</div>
	    	<input type="number" min="0" step="0.10" class="form-control text-right" id="quantia" name="quantia" placeholder="000,00">	      
		</div>
	  </div>	  
	  <button type="submit" class="btn btn-success">Adicionar</button>
	 <?=form_close();?> 
	 <hr />
	  <table class="table table-striped">
  		<thead>
  			<tr>
  				<th>Data</th>
  				<th>Tipo</th>
  				<th class="text-right text-success">Valor</th>  				
  			</tr>
  		</thead>
  		<tbody>
  			<tr class="text-success">
  				<td>17-03-2014</td>
  				<td>Aporte</td>
  				<td class="text-right">R$ 632,14</td>  				
  			</tr>
  			<tr class="text-success">
  				<td>18-03-2014</td>
  				<td>Aporte</td>
  				<td class="text-right">R$ 55,90</td>  				
  			</tr>
  			<tr class="text-danger">
  				<td>25-03-2014</td>
  				<td>Retirada</td>
  				<td class="text-right">R$ -1000,00</td>  				
  			</tr>
  			<tr class="text-success">
  				<td>28-03-2014</td>
  				<td>Aporte</td>
  				<td class="text-right">R$ 811,17</td>  				
  			</tr>
  			<tr class="info">
  				<td><strong>Total</strong></td>
  				<td></td>
  				<td class="text-right"><strong>R$ 499,21</strong></td>  				
  			</tr>
  		</tbody>
  	  </table>
</div>