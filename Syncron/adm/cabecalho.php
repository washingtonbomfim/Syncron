<?php
include "modals.php";
include '../bd/conecta.php';
?>﻿
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Syncron</title>
	
    <!-- Bootstrap -->
    <!--<link href="../css/Painel.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link href="waitingfor/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="css/sb-admin.css" rel="stylesheet">
	<link href="../css/fullscreen.css" rel="stylesheet"	>
	<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<link rel="stylesheet" href="../css/select2-bootstrap.css">
	<link rel="stylesheet" href="../css/select2.css">
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>		
	<script src="../js/bootstrap.js"></script>		

	<script src="../js/select2.js"></script>
	<script src="../js/jquery-placeholder.js"></script>
	<script src="../js/theme.admin.extension.js"></script>
		<!-- Admin Extension Examples -->
	<script type="text/javascript">

	
        $(document).ready(function()
        {
            $("#myModalProcedimento").modal("show");
        });
    </script>
    
    <!--esconde as parada -->
<script type="text/javascript">
            EsconderAmigo();
            EsconderGrupo();
            $(document).ready(function() {
                $("#amigos").click(MostrarAmigo);
                $("#grupos").click(MostrarGrupo);
                });
 
            function MostrarAmigo(){
                $("#mostraAmigo").show();
                 $("#mostraGrupo").hide();
            }
            function EsconderAmigo(){
                $("#mostraAmigo").hide();
            }
            function MostrarGrupo(){
                $("#mostraGrupo").show();
                $("#mostraAmigo").hide();
            }
            function EsconderGrupo(){
                $("#mostraGrupo").hide();
            }
        </script>

<style type="text/css">
body{
	background:url(../img/bg.png);
}
.tam-select{
	width:570px;	
}

.mt-100 {
    margin-top: 100px; 
}
.mb-100 {
    margin-bottom: 100px;
}

.icon {
    width: 32px;
    height: 32px;
    text-align: center;
    padding: 7px 8px;
    border: 2px solid;
    border-radius: 50%;
}

.header {
    padding-top: 50px;
    background-color: #eee;
    overflow: hidden;
	min-height:800px;
	border-bottom:1px solid #ccc;
}
.footer {
    color: #887;
    padding-top: 30px;
    padding-bottom: 30px;
	border-bottom:1px solid #eee;
}

.content {
    position: relative;
    display: table;
    width: 100%;
    min-height: 100vh;
}
.pull-middle {
    display: table-cell;
    vertical-align: middle;
}

.btn {
    padding-left: 25px;
    padding-right: 25px;
}
.btn-circle {
    border-radius: 20px;
}
.btn-upload {
	background:url(../img/icn-down.png) no-repeat center;
    width: 100px;
    height: 100px;
}

.input-group input {
    border: 0;
    box-shadow: none;
    padding-right: 30px;
}
.input-group input:focus,
.input-group input:active {
    outline: 0;
    box-shadow: none;
}
.input-group-btn:last-child>.btn {
    z-index: 2;
    margin-left: -18px;   
    border-radius: 20px;
}

.phone {
    position: relative;
    max-width: 263px;
    margin: 0 auto;
    padding: 65px 15px 55px;
    border: 2px solid #ddd;
    border-radius: 20px;
    background-color: #222;
    box-shadow: 20px 20px 40px #887;
}
.center-home{
	margin:0 auto;
	padding:0;
	}

</style>
</head>
<body>
	<div class="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <!-- pra ver o menu pelo celular -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <!-- termina aqui o celular... pelomenos acho -->
          <a href="home.php" class="navbar-brand text-uppercase">SYNCRON</a><a class="navbar-brand text-uppercase" href="lista_arquivos.php"><span class="label btn-primary text-capitalize">Meus Arquivos</span></a>
         <a class="navbar-brand text-uppercase" href="lista_arquivos_compartilhados.php"><span class="label btn-primary text-capitalize">Arquivos Compartilhados</span></a>
         <!-- <select data-plugin-selectTwo  class="populate placeholder tam-select" placeholder="teste" data-plugin-options='{ "placeholder": "Select a State", "allowClear": false }'>
                    <option value="AK">Pesquisar...</option>
                    <option>Alaska +ADD</option>
                    <option>Hawaii +ADD</option>
          </select>-->
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="nav navbar-nav navbar-right">
                <!--<li><a data-toggle="modal" data-target="#MdlCadastraAmigo"><button type="button" class="btn btn-primary navbar-btn btn-circle">
                        <i class="glyphicons glyphicon-plus"></i><span><img style="width:15px; height:15px; margin-top:-5px;" src="../img/icn-usr.png"/></span></button></a>
                </li>-->
                <!--<li><a data-toggle="modal" data-target="#MdlCadastraGrupo"><button type="button" class="btn btn-primary navbar-btn btn-circle">
                        <span><img style="width:15px; height:15px; margin-top:-5px" src="../img/icn-grp.png"/></span>
                    </button></a>
                </li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php echo $_SESSION['login']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li>
                            <a href="#MdlCadastraAmigo" data-toggle="modal" data-target="#MdlCadastraAmigo"><i class="fa fa-fw fa-power-off"></i>Lista Amigos</a>
                        </li>
                        <li>
                            <a href="#MdlCadastraGrupo" data-toggle="modal" data-target="#MdlCadastraGrupo"><i class="fa fa-fw fa-power-off"></i>Criar Grupos</a>
                        </li>
                        <li>
                            <a href="../adm/pesquisar_amigos.php"><i class="fa fa-fw fa-power-off"></i>Adicionar Amigos</a>
                        </li>
                        <li>
                            <a href="#MdlVinculaAmigos" data-toggle="modal" data-target="#MdlVinculaAmigos"><i class="fa fa-fw fa-power-off"></i>Vincular Amigos em Grupos</a>
                        </li>
                        <li>
                            <a href="../adm/lista_amigos_grupo.php"><i class="fa fa-fw fa-power-off"></i>Lista Amigos em Grupos</a>
                        </li>
                        <li>
                            <a href="../adm/logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
      </div>
    </nav>
  <div role="main" class="main">
     <div class="container">
