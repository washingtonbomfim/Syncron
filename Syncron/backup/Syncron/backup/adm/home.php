<?php
	session_start(); 
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
		unset($_SESSION['login']); 
		unset($_SESSION['senha']); 
		header("Location: ../index.php?retorno=2");
	}
	include "cabecalho.php";
?>

<header class="header">
        <div class="container">
            <div class="row">
                <br />
                <br />
                <br />
            	<h1 class="text-center"><img src="../img/logo-cloud.png"></h1>
            	<br />
            	<br />
                <h2 class="text-center">Click para Upload</h2>
                <br />
                <br />
            	<form class="text-center" action="enviar_arquivo.php" role="form">
                  	<button class="btn btn-primary btn-upload" type="submit"></button>
            	</form>
                <br />
            	<br />
            	<br />
            </div>
        </div>
    </header>
</div>


<?php

include "rodape.html";

?>