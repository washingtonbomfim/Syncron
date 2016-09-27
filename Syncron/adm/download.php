<?php
include '../bd/conecta.php';
session_start();
$uploaddir = $_SESSION['uploaddir'];
$codigo_diretorio = $_SESSION['codigo_diretorio'];
$cod = $_SESSION['codigo_usuario'];
$codigo_arquivo = $_REQUEST['id'];
$tipo = $_REQUEST['tipo'];

    if($tipo==1){
        $sql =  $conecta->query("select nome_arquivo from syncron.sync_arquivos
                                        where codigo_arquivo = '$codigo_arquivo' and codigo_usuario = '$cod'");
        while ($i = $sql->fetch_assoc()) {
         $nome_musica = $i['nome_arquivo'];
        }
        define('DIR_DOWNLOAD',$uploaddir.'documentos/' ); // Aqui vale qualquer coisa :)
        $arquivo = $_GET[$nome_musica];

        //if (stripos($arquivo, './') !== false || stripos($arquivo, '../') !== false || !file_exists($arquivo)){
         //  exit('Operacao nao permitida.');
        // }

        $nome_musica = DIR_DOWNLOAD.$nome_musica; // Aqui a gente só junta o diretório com o nome do arquivo

        header('Content-type: octet/stream');
        header('Content-disposition: attachment; filename="'.basename($nome_musica).'";');
        header('Content-Length: '.filesize($nome_musica));
        readfile($nome_musica);
        exit;

    }elseif($tipo==2){
         
         $sql =  $conecta->query("select nome_arquivo from syncron.sync_arquivos
                                        where codigo_arquivo = '$codigo_arquivo' and codigo_amigo = '$cod'");
         while ($i = $sql->fetch_assoc()) {
            $nome_musica = $i['nome_arquivo'];
        }
         $sql2 = $conecta->query("select descricao from sync_diretorios where codigo_diretorio = (select codigo_diretorio from syncron.sync_arquivos
                                        where codigo_arquivo = '$codigo_arquivo' and codigo_amigo = '$cod')");
         while ($i = $sql2->fetch_assoc()) {
            $diretorio = $i['descricao'];
        }

        define('DIR_DOWNLOAD',$diretorio.'documentos/' ); // Aqui vale qualquer coisa :)
        $arquivo = $_GET[$nome_musica];

    //if (stripos($arquivo, './') !== false || stripos($arquivo, '../') !== false || !file_exists($arquivo)){
      //  exit('Operacao nao permitida.');
   // }

       $nome_musica = DIR_DOWNLOAD.$nome_musica; // Aqui a gente só junta o diretório com o nome do arquivo

        header('Content-type: octet/stream');
        header('Content-disposition: attachment; filename="'.basename($nome_musica).'";');
        header('Content-Length: '.filesize($nome_musica));
        readfile($nome_musica);
        exit;
    }
    
?>