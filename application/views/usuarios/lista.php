<div class='row'>
	<ol class="breadcrumb">
	  <li><a href="<?=base_url('home')?>">Home</a></li>
	  <li class="active">Usu&aacute;rios</li>  
	</ol>
</div>

<div class='row'>
	<?=form_open('usuarios/resultado_busca', array('role' => 'form', 'class' => 'form-inline', 'method' => 'get'));?>
	  <div class="form-group">	   
	    <input type="search" class="form-control campo-busca" id="q" value="<?=$q?>" placeholder="digite o nome ou o email" name="q">	  	
	  </div>
	  <button type="submit" class="btn btn-default button-pesquisar">Pesquisar</button>
	  <button type="button" class="btn btn-success button-adicionar" onclick="location.href='<?=base_url('usuarios/criar')?>'">Adicionar Usu&aacute;rio</button>
	<?=form_close();?>
</div>

<br />

<div class="row">

<img src="<?php echo base_url("assets/img/icons/user_gray.png"); ?>" /> = <em>administrador</em>
<hr />
<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Data do &Uacute;ltimo Login</th>
          <th></th>
        </tr>
      </thead>
      <tbody>      	
      	<?php foreach($usuarios as $u): ?>
        <tr>
          <td><?php echo $u->id; ?></td>
          <td>
          	<a href="<?php echo base_url("usuarios/editar") . "/" . $u->id;?>">
          	 <?php if($u->admin == 1){ ?>
                  <img src="<?php echo base_url("assets/img/icons/user_gray.png"); ?>" />
              <?php } ?>
            	<?php echo $u->nome; ?>             
          	</a>          		
          </td>
          <td><?php echo $u->email; ?></td>
          <td><?php echo $u->data_ultimo_login; ?></td>
          <td>
          	<?php if($usuario->id != $u->id) : ?>
                <a href="<?php echo base_url("usuarios/excluir") . "/" . $u->id;?>" title="Excluir" class="btn btn-default button-delete">Apagar</a>            
            <?php endif; ?>
          </td>
        </tr>            
        <?php endforeach; ?>   
      </tbody>
    </table>
 </div>


<?php echo $paginacao; ?>