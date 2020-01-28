<?php

error_reporting(0);
//error_reporting( error_reporting() & ~E_NOTICE );
//error_reporting(E_ALL ^ E_WARNING);
//ini_set(“display_errors”, 1 );

session_start();

define('ROOT_PATH', __DIR__);

//require_once "Model/Helper.php";

//use Mensagens;
require_once "vendor/autoload.php";
require_once "Model/Conexao.php";
require_once "Model/FuncoesAdicionais.php";

$usuario = null;
$email = null;
$urlImagem = null;
$empresa = null;
$branchId = null;
$redeEmpresa = null;
$codigoEmpresa = null;
$urlLogo = null;

if(isset($_SESSION["Autenticacao"])){
    foreach($_SESSION["Autenticacao"] as $aut){
        $usuario = $aut["Usuario"];
        $email = $aut["Email"];
        $urlImagem = $aut["UrlImagem"];
        $empresa = $aut["Empresa"];
        $branchId = $aut["BranchId"];
        $redeEmpresa = $aut["REDE"];
        $isAdmin = $aut["isAdmin"];
        $codigoEmpresa = $aut["CODIGO_EMPRESA"];
        $urlLogo = $aut["URL_LOGO"];
    }

    $_SESSION["UsuarioAutenticado"] = $usuario;
    $_SESSION["isAdmin"]=$aut["isAdmin"];
    $_SESSION["redeEmpresa"]=$aut["REDE"];
    $_SESSION["BranchId"]=$aut["BranchId"];
}
else{
  header("Location: login.php", 200);
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title><?php echo($title_page); ?></title>
    
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
    
    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="css/bootstrap-extend.css">
    
    <link href="assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">

    <!-- Morris charts -->
    <link rel="stylesheet" href="assets/vendor_components/morris.js/morris.css">	
    
    <!-- Chartist-->
    <link rel="stylesheet" href="assets/vendor_components/chartist-js-develop/chartist.css">
    
    <!-- nvd3-->
      <link href="assets/vendor_components/nvd3/nv.d3.min.css" rel="stylesheet" type="text/css" media="screen" />
    
    <!-- theme style -->
    <link rel="stylesheet" href="css/master_style.css">
    
    <!-- horizontal menu style -->
    <link rel="stylesheet" href="css/horizontal_menu_style.css">
    
    <!-- Lion_admin skins -->
    <link rel="stylesheet" href="css/skins/_all-skins.css">
      
    <!-- Css Customizavel -->
    <link rel="stylesheet" href="css/custom.css">

  </head>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper font-weight-bold">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
	  <b class="logo-mini">
		  <span class="light-logo"><img src="../images/logo-light.png" alt="logo"></span>
		  <span class="dark-logo"><img src="../images/logo-dark.png" alt="logo"></span>
	  </b>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
		  <img src="../images/logo-light-text.png" alt="logo" class="light-logo">
	  	  <img src="../images/logo-dark-text.png" alt="logo" class="dark-logo">
	  </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle d-block d-lg-none" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
	  
	  <ul class="navbar-nav mr-auto mt-md-0">		
		
	</ul>	
		
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		  	  
            <!-- Notifications -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="mdi mdi-bell"></i>
              </a>
              <ul class="dropdown-menu scale-up">
                <li class="header">Notificações</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu inner-content-div">
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> Nunc fringilla lorem 
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>

		    <!-- User Account -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo($urlLogo); ?>" class="user-image rounded-circle" alt="User Image">
            </a>
            <ul class="dropdown-menu scale-up">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo($urlImagem ); ?>" class="float-left rounded-circle" alt="User Image">

                  <p>
                    <?php echo($usuario); ?>
                    <small class="mb-5">Empresa: <?php echo($codigoEmpresa); ?></small>
                    <a href="#" class="btn btn-danger btn-sm btn-rounded">Ver Perfil</a>
                  </p>
                </li>
              <!-- Menu Body -->
              <li class="user-body">
                  <div class="row no-gutters">
            
                    <div class="col-12 text-left">
                      <a href="configuracao.php"><i class="ion ion-settings"></i> Configuração</a>
                    </div>

                      <div role="separator" class="divider col-12"></div>

                    <div class="col-12 text-left">
                      <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                    </div>				
                  </div>
                  <!-- /.row -->
                </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
      <!-- sidebar -->
      <section class="sidebar">
        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
              <li class="active">
                <a href="index.php">
                  <i class="fa fa-dashboard"></i> <span>Home</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                  </span>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-th"></i>
                  <span>Pedidos</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="pedidos.php">Pesquisa</a></li>
                  <li><a href="pedidosDetalhes.php">Detalhes</a></li>
                  <li><a href="#">Cadastro</a></li>
                  <li><a href="#">Separação</a></li>
                  <li><a href="pedidosRastreio.php">Rastreio</a></li>
                  <li><a href="pedidosPendentes.php">Pendentes</a></li>
                  <li><a href="pedidosManutencao.php">Manutenção</a></li>
                  <li class="treeview">
                    <a href="#">Relatórios 
                      <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                  </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="#">Pagametos</a></li>	
                      <li><a href="#">Status</a></li>		
                      <li><a href="#">Clientes</a></li>			  
                    </ul>
                  </li>
                </ul>
              </li>
                    
              <li class="treeview">
                    <a href="#">
                      <i class="fa fa-table"></i> <span>Clientes</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="#">Cadastro</a></li>
                      <li><a href="pedidosClientes.php">Pesquisa</a></li>
                    </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-plug"></i> <span>Produtos</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="produtos.php">Pesquisa</a></li>
                  <li><a href="produtosCadastro.php">Cadastro</a></li>
                  <li><a href="produtosInventario.php">Estoque</a></li>
                  <li><a href="#">Preco</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-file"></i> <span>Tabelas de Apoio</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <?php
                      foreach($_SESSION["TabelasApoioMenu"] as $tabApoio){
                  ?>
                        <li><a href="<?php echo($tabApoio["Url"]); ?>"><span class="<?php echo($tabApoio["IconClass"]); ?>"></span> <?php echo($tabApoio["DESCRICAO"]); ?></a></li>
                  <?php
                      }
                  ?>
                </ul>
              </li>
              
              <li>
                <a href="processosJobs.php">
                  <i class="fa fa-envelope-open-o"></i> <span>Processos</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                  </span>
                </a>
              </li>
            </ul>
      </section>
    </aside>

    <!-- Variáveis para serem recuperadas no JS -->
    <input type="hidden" name="branch_id" value="<?= $branchId ?>">
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
      if (isset($_SESSION["MensagemUser"])){
        echo('<div class="container-fluid" id="messageStatus">');
          echo('<div class="alert alert-' . $_SESSION["TipoMessagem"]  . ' alert-dismissible fade show" role="alert">');
            echo($_SESSION["MensagemUser"]);
            echo('<button type="button" class="close" data-dismiss="alert" aria-label="Close">');
            echo('<span aria-hidden="true">&times;</span>');
            echo('</button>');
          echo("</div>");
        echo("</div>");
      }
    ?>







