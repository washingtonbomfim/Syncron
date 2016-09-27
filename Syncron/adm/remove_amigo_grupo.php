<?php
	session_start();
	include '../bd/conecta.php';

	$codigo_usuario = $_SESSION['codigo_usuario'];
	@$tipo = $_REQUEST['tipo'];
	@$cod_user = $_REQUEST['cod_user'];
	@$cod_grup = $_REQUEST['cod_grup'];

?>

<?php 
	if($tipo == 1){
		$sql = $conecta->query("update syncron.sync_amigos set status = 'C' where codigo_usuario = ".$codigo_usuario. " and codigo_amigo = ".$cod_user);
		if($sql > 0){
			header("Location: home.php?return=3");
			
		}else{
			header("Location: home.php?return=-3");
			//echo "update syncron.sync_amigos set status = 'C' where codigo_usuario = ".$codigo_usuario. " and codigo_amigo = ".$cod_user;
		}
	}elseif ($tipo == 2) {
		$sql = $conecta->query("update syncron.sync_grupos set status = 'C' where codigo_usuario_criacao = ".$codigo_usuario. " and id_grupo = ".$cod_grup);
		if($sql > 0){
			header("Location: home.php?return=4");
			//echo "GRUPO REMOVIDO.";
		}else{
			header("Location: home.php?return=-4");
			//echo "NAO FOI POSSIVEL REMOVER GRUPO.";
		}
	}elseif ($tipo == 3) {
		$sql = $conecta->query("update syncron.sync_grupo_usuarios set status = 'C' where codigo_grupo = ".$cod_grup. " and codigo_usuario = ".$cod_user);
		if($sql > 0){
			header("Location: lista_amigos_grupo.php?return=2");
			//echo "GRUPO REMOVIDO.";
		}else{
			header("Location: lista_amigos_grupo.php?return=-2");
			//echo "NAO FOI POSSIVEL REMOVER GRUPO.";
		}
	}