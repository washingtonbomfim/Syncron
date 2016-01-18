<?php
    include '../bd/conecta.php';
    session_start();

    @$tipo = $_REQUEST['tipo'];
    $codigo_usuario = $_SESSION['codigo_usuario'];
    $codigo_arquivo = $_REQUEST['id'];
    $uploaddir = $_SESSION['uploaddir'];
    $codigo_diretorio = $_SESSION['codigo_diretorio'];
?>

<?php
    if($tipo==1){
		
        $sql = $conecta->query("update syncron.sync_arquivos set status = 'C' where codigo_usuario = '$codigo_usuario'
                                and codigo_arquivo = '$codigo_arquivo' and tipo_arquivo = 1");
        $nome = $conecta->query("select nome_arquivo from syncron.sync_arquivos
                                        where codigo_arquivo = '$codigo_arquivo'");
        while ($i = $nome->fetch_assoc()) {
            $nome_musica = $i['nome_arquivo'];
        }
		echo $nome_musica;
        if($sql > 0) {
            unlink($uploaddir."musicas/".$nome_musica);

            echo "Arquivo excluido";
        }


    }elseif($tipo==2){
        $sql = $conecta->query("update syncron.sync_arquivos set status = 'C' where codigo_usuario = '$codigo_usuario'
                                and codigo_arquivo = '$codigo_arquivo' and tipo_arquivo = 2");
    }elseif($tipo==3){
        $sql = $conecta->query("update syncron.sync_arquivos set status = 'C' where codigo_usuario = '$codigo_usuario'
                                and codigo_arquivo = '$codigo_arquivo' and tipo_arquivo = 3");
    }elseif($tipo==4){
        $sql = $conecta->query("update syncron.sync_arquivos set status = 'C' where codigo_usuario = '$codigo_usuario'
                                and codigo_arquivo = '$codigo_arquivo' and tipo_arquivo = 4");
    }else{
        //echo "<script>alert("Houve um problema na exclusao")</script>";
        echo "nao deu certo a exclusao";
    }

?>