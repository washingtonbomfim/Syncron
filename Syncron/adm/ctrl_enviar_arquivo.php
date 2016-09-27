<?php
include '../bd/conecta.php';
session_start();

@$tipo_arquivo = $_REQUEST['tipo_arquivo'];
$cod = $_SESSION['codigo_usuario'];
$uploaddir = $_SESSION['uploaddir'];
$codigo_diretorio = $_SESSION['codigo_diretorio'];


//echo $tipo_arquivo = strrchr(basename($_FILES['userfile']['name']),"."); //pega a extencao, acho que ainda nao precisa
if($tipo_arquivo == 1){
    $uploadfile = $uploaddir."documentos/". basename($_FILES['userfile']['name']); //pega o nome
}
elseif($tipo_arquivo == 2){
    $uploadfile = $uploaddir."documentos/". basename($_FILES['userfile']['name']); //pega o nome
}

echo  $uploadfile;
echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

    echo "Arquivo valido e enviado com sucesso.\n";

    $nome_arquivo = basename($_FILES['userfile']['name']);

    $sql = $conecta->query("INSERT INTO syncron.sync_arquivos(nome_arquivo,codigo_usuario,
                            codigo_diretorio,tipo_arquivo,hash_nome_arquivo,status,compartilhado,codigo_amigo,data_envio)VALUES
                            ('$nome_arquivo','$cod',
                            '$codigo_diretorio',1,'0000000000','E','N','$cod',(SELECT DATE_FORMAT(NOW(),'%d-%m-%Y')))");

 //   $resultado = $conecta->$query($sql);

    if($sql > 0){
        echo "blz";
    }
    else{
        echo "erro ao inserir na tabela";
    }

} else {
    echo "Possivel ataque de upload de arquivo!\n";
}

//echo 'Aqui está mais informações de debug:';
//print_r($_FILES);
$conecta->close();

print "</pre>";

header("Location: lista_arquivos.php?tipo=1");

?>
