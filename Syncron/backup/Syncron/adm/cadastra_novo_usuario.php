<?php

require_once("../PHPMailer/PHPMailerAutoload.php");
require_once("../PHPMailer/class.phpmailer.php");
include '../bd/conecta.php';

@$nome = $_REQUEST['nome'];
@$sobrenome = $_REQUEST['sobrenome'];
@$email = $_REQUEST['email'];
@$senha = $_REQUEST['senha'];
@$con_senha = $_REQUEST['con_senha'];

if($nome == "" || $sobrenome == "" || $email == "" || $senha == "" || $con_senha == ""){
    print "existem campos em branco";
}
$nome_completo = "$nome  $sobrenome";

$sql_confere_nome = $conecta->query("SELECT login FROM sync_usuarios where login = '$nome' ");

$i = $sql_confere_nome->fetch_row();

if($i[0] == NULL){

       $sql_cadastra_usu =  $conecta->query("INSERT INTO syncron.sync_usuarios(email,senha,nome_completo,login)
                        VALUES ('$email','$senha','$nome_completo','$nome')");

        if($sql_cadastra_usu > 0){
            $sql1 = $conecta->query("INSERT INTO syncron.sync_diretorios(codigo_usuario,descricao)
                             VALUES((select codigo_usuario from sync_usuarios where login = '$nome' and senha = '$senha'),
                             '/opt/$nome/')");

        mkdir("/opt/$nome") or die ("erro ao criar diretorio");
        mkdir("/opt/$nome/musicas") or die ("erro ao criar diretorio musica");
        mkdir("/opt/$nome/documentos") or die ("erro ao criar diretorio documentos");
        mkdir("/opt/$nome/imagens") or die ("erro ao criar diretorio imagens");

        }
        $senha_aleatorio = rand(10000,99999);
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "syncron.suporte@gmail.com";
        $mail->Password = "4f9bba0717";
        //$mail->From = "syncron.suporte@gmail.com";
        $mail->FromName = "Syncron";

        $mail->AddAddress($email,$nome_completo);
        $mail->isHTML(true);
        $mail->Subject = "Envio de Senha";
        //$mail->AltBody = "Esta e sua senha \r \n";
        $mail->Body = "Esta e sua senha $senha_aleatorio \r \n";
        $enviado = $mail->send();
        $mail->clearAllRecipients();
        $mail->clearAttachments();

        if($enviado){
            echo " Sua senha foi enviada para seu email.";
        }else{
            echo " Nao foi possivel enviar email com a senha.";
        }
}
else{
        print "usuario ja existe um login" ;
}

?>

