<?php
include '../bd/conecta.php';
@$nome_grupo = $_REQUEST['nome_grupo'];
session_start();
$cod = $_SESSION['codigo_usuario'];

    $sql1 = $conecta->query("select nome_grupo from syncron.sync_grupos where nome_grupo like '$nome_grupo' and status = 'A' and codigo_usuario_criacao = '$cod'");
    if($sql1->num_rows > 0){
         header("Location: home.php?return=2");
         //echo "Já existe um grupo com este nome, favor escolher outro";
    }else{
        $sql = $conecta->query("INSERT INTO syncron.sync_grupos(nome_grupo,codigo_usuario_criacao, status)VALUES('$nome_grupo','$cod','A')");

        if($sql > 0){
            header("Location: home.php?return=1");
        }else{
            header("Location: home.php?return=-1");
            //echo "Não Foi possivel Cadastrar o Grupo! Tente Novamente..";
        }
    }
?>