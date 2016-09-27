<?php
	session_start();
    include '../bd/conecta.php';

    @$tipo = $_REQUEST['tipo'];
    $codigo_usuario = $_SESSION['codigo_usuario'];
    $codigo_amigo = $_REQUEST['id'];
	
?>
<?php
    $sql = $conecta->query("select distinct('X') from sync_amigos where codigo_usuario = ".$codigo_usuario.
                            " and codigo_amigo = ". $codigo_amigo . " and status='A'");
    if($sql->num_rows > 0){
        header("Location: pesquisar_amigos.php?erro=1");
    }else{
        $sql2 = $conecta->query("INSERT INTO syncron.sync_amigos(codigo_usuario,codigo_amigo, status)".
                                " VALUES(". $codigo_usuario . "," . $codigo_amigo . ",'A')");
        if($sql2 > 0){
            header("Location: pesquisar_amigos.php?erro=2");
        }
    }
    
    
?>


