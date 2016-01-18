<?php
include '../bd/conecta.php';
session_start();
$uploaddir = $_SESSION['uploaddir'];
$codigo_diretorio = $_SESSION['codigo_diretorio'];
$cod = $_SESSION['codigo_usuario'];
$codigo_arquivo = $_REQUEST['id'];


    $sql =  $conecta->query("select nome_arquivo from syncron.sync_arquivos
                                        where codigo_arquivo = '$codigo_arquivo' and codigo_usuario = '$cod'");
    while ($i = $sql->fetch_assoc()) {
        $nome_musica = $i['nome_arquivo'];
    }
    define('DIR_DOWNLOAD',$uploaddir.'musicas/' ); // Aqui vale qualquer coisa :)
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
?>