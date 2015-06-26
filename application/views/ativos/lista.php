<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li class="active">Meus Ativos</li>  
	</ol>
</div>

<?php $segmento = strtolower($this->uri->segment(2)); ?>

<div class='row'>
	  <?php  if($segmento == "categoria") : ?>
      <button type="button" class="btn btn-primary" onclick="location.href='<?=base_url('ativos/')?>'">Voltar</button>  
    <?php endif; ?>
	 <button type="button" class="btn btn-success btn-adicionar" onclick="location.href='<?=base_url('ativos/criar')?>'">Adicionar Novo Ativo</button>	
</div>

<br />

<div class="row">
<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>    
          <th>Categoria</th>
          <th>Grau de Risco</th>    
          <th>Montante</th>          
          <th>Varia&ccedil;&atilde;o</th>
          <th></th>
        </tr>
      </thead>
      <tbody>      	
      	<?php foreach($ativos as $ativo): ?>
        <tr>
          <td><?php echo $ativo->id; ?></td>
          <td>
          	<a href="<?php echo base_url("ativos/editar") . "/" . $ativo->id;?>">
          		<?php echo $ativo->nome; ?>
          	</a>          		
          </td>
          <td>
            <a href="<?php echo base_url("ativos/categoria") . "/" . cria_nome_url($ativo->Categoria()->nome);?>">
              <?php echo $ativo->Categoria()->nome; ?>
            </a>              
          </td>
          <td>            
              <?php echo $ativo->Categoria()->Risco()->nome; ?>            
          </td>
          <td>         
            <a href="<?php echo base_url("ativos/movimentacao") . "/" . $ativo->id;?>">   
              R$ 000,00            
            </a> 
          </td>                        
          <td>            
              0,00 %            
          </td>                 
          <td>
          	<a href="<?php echo base_url("ativo/excluir") . "/" . $ativo->id;?>" title="Excluir" class="btn btn-danger"> X </a>          	
          </td>
        </tr>            
        <?php endforeach; ?>   
      </tbody>
    </table>
 </div>

<div class="row text-center">
	<?php echo $paginacao; ?>
</div>