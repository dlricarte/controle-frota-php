
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/truck.ico');?>">
	  <?php $segmento = strtolower($this->uri->segment(1)); ?>
    <title>Controle de Frotas :: <?php echo $segmento?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.ico');?>" />

    <link href="<?php echo base_url('assets/css/jquery-ui.min.css');?>" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/template.css');?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand site-id" href="<?php echo base_url();?>">
            <img  class="site-logo" src="<?php echo base_url('assets/img/logo.png');?>" width="28" alt="logo invest" title="Invest" />
            <span class="site-name">Controle de Frota</span>
          </a>
        </div>
        <?php if(isset($usuario)) : ?>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">            
            <li class="<?php echo  $segmento == "clientes" ? "active" : "" ?>"><a href="<?php echo base_url('clientes');?>">Clientes</a></li>
            <li class="<?php echo  $segmento == "fornecedores" ? "active" : "" ?>"><a href="<?php echo base_url('fornecedores');?>">Fornecedores</a></li>
            <li class="<?php echo  $segmento == "motoristas" ? "active" : "" ?>"><a href="<?php echo base_url('motoristas');?>">Motoristas</a></li>
            
            <li class="dropdown <?php echo  $segmento == "veiculos" ? "active" : "" ?>">              
              <a href="#" data-toggle="dropdown" class="dropdown-toggle">Ve&iacute;culos <b class="caret"></b></a>
              <ul class="dropdown-menu">
                    <li class="dropdown-header"><strong>Cadastro</strong></li>
                    <li><a href="<?php echo base_url('veiculos');?>">Viaturas</a></li>
                    <li><a href="<?php echo base_url('setores');?>">Setores de Uso</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header"><strong>Manuten&ccedil;&atilde;o</strong></li>
                    <li><a href="<?php echo base_url('abastecimentos');?>">Abastecimentos</a></li>
                    <li><a href="<?php echo base_url('pecas');?>">Pe&ccedil;as</a></li>
                    <li><a href="<?php echo base_url('servicos');?>">Servi&ccedil;os</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url('veiculos/imprimir_lista');?>">Imprimir Lista de Ve&iacute;culos</a></li>
                </ul>
            </li>            
          <?php if($usuario->admin == 1) { ?>
            <li class="<?php echo  $segmento == "usuarios" ? "active" : "" ?>"><a href="<?php echo base_url('usuarios');?>">Usu&aacute;rios</a></li>
          <?php } ?>            
          </ul>          
          <ul class="nav navbar-nav navbar-right">
            <li class="saudacao">Ol&aacute;, <?php echo $usuario->nome;?></li>          
            <li class="active"><a href="<?php echo base_url("logout");?>">Sair</a></li>
          </ul>                  
        </div><!--/.nav-collapse -->  
        <?php endif; ?>         
      </div>      
    </div>
    <div class="container">    	