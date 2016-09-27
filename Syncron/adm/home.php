<?php
	session_start(); 
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
		unset($_SESSION['login']); 
		unset($_SESSION['senha']); 
		header("Location: ../index.php?retorno=2");
	}
	include "cabecalho.php";
    include "modals.php";
    @$return = $_REQUEST['return'];
?><head>
<style>


.btn3d {
    position:relative;
	border-radius:100px;
    top: -6px;
    border:0;
     transition: all 40ms linear;
     margin-top:10px;
     margin-bottom:10px;
     margin-left:2px;
     margin-right:2px;
}
.btn3d:active:focus,
.btn3d:focus:hover,
.btn3d:focus {
    -moz-outline-style:none;
         outline:medium none;
}
.btn3d:active, .btn3d.active {
    top:2px;
}

.btn3d.btn-danger {
    box-shadow:0 0 0 1px #b93802 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 10px 0 0 #AA0000, 0 8px 8px 1px rgba(0,0,0,0.5);
    background-color:#D73814;
}

.btn3d.btn-info {
    box-shadow:0 0 0 1px #00a5c3 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #348FD2, 0 12px 8px 1px rgba(0,0,0,0.5);
    background-color:#39B3D7;
}

.center {
    margin-top:50px;
}

.modal-header {
	padding-bottom: 5px;
}

.modal-footer {
    	padding: 0;
	}
    
.modal-footer .btn-group button {
	height:40px;
	border-top-left-radius : 0;
	border-top-right-radius : 0;
	border: none;
	border-right: 1px solid #ddd;
}
	
.modal-footer .btn-group:last-child > button {
	border-right: 0;
}
.multiselect {
    width: 200px;
}
.selectBox {
    position: relative;
}
.selectBox select {
    width: 100%;
    font-weight: bold;
}
.overSelect {
    position: absolute;
    left: 0; right: 0; top: 0; bottom: 0;
}
#checkboxes {
    display: none;
    border: 1px #dadada solid;
}
#checkboxes label {
    display: block;
}
#checkboxes label:hover {
    background-color: #1e90ff;
}
</style>
<script>
    var expanded = false;
    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
<?php
        if($return == -1){
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Aviso!</strong> Não foi possivel cadastrar o Grupo, favor tentar novamente ou entrar em contato com o Administrador da rede..
                </div>
                </div>
                </div>
                </div>";                                    
        }elseif ($return == 1) {
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong></strong> Grupo cadastrado com sucesso!
                </div>
                </div>
                </div>
                </div>";
            }elseif ($return == 2) {
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-warning alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong></strong> Já existe um grupo com este nome, favor escolher outro nome.
                </div>
                </div>
                </div>
                </div>";
            }elseif ($return == -3) {
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong></strong> Não foi possivel remover amigo.
                </div>
                </div>
                </div>
                </div>";
            }elseif ($return == 3) {
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong></strong> Amigo removido.
                </div>
                </div>
                </div>
                </div>";
            }elseif ($return == 4) {
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong></strong> Grupo removido.
                </div>
                </div>
                </div>
                </div>";
            }elseif ($return == -4) {
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong></strong> Não foi possivel remover Grupo.
                </div>
                </div>
                </div>
                </div>";
            }
?>
</head>

<div class="container">
    <div class="row">
        <br />
        <h1 class="text-center"><img src="../img/logo-cloud.png"></h1>
        <br />
         <center><a data-toggle="modal" data-target="#idModal"><button style="width: 200px; height: 200px" type="button" class="btn btn-info btn-lg btn3d"><img src="../img/icn-down.png"/></button></a></center>
        <!--<form class="text-center" action="enviar_arquivo.php" role="form">-->
            <!--<button class="btn btn-primary btn-upload" type="submit"></button>-->
            <!--<center><div class="center"><button data-toggle="modal" data-target="#idModal" class="btn btn-primary center-block">Click Me</button></div></center>-->
        <!--</form>-->
    </div>
</div>

<?
	include "rodape.php";
?>
