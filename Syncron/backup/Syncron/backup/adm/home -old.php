<?php
	session_start(); 
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
		unset($_SESSION['login']); 
		unset($_SESSION['senha']); 
		header("Location: ../index.php?retorno=2");
	}
	include "cabecalho.html";
?>

	<div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Menu rápido
                </div>
                <div class="panel-body">
                    <div class="menu_centro">
                    	<div class="menu_home">
                    		<center><a href="musicas.php?tipo=1"><img src="../img/musica.png" />
                            <p>Musicas</p></a></center>
                    	</div>
                        <div class="menu_home">
                            <center><a href="enviar_arquivo.php?tipo=0"><img src="../img/enviar.png" />
                                    <p>Uploads</p></a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>

<?php 

	include "rodape.html";

?>