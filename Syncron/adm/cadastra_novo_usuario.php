<?php

require_once("../PHPMailer/PHPMailerAutoload.php");
require_once("../PHPMailer/class.phpmailer.php");
include '../bd/conecta.php';

@$nome = $_REQUEST['primeiro_nome'];
@$sobrenome = $_REQUEST['sobrenome'];
@$login = $_REQUEST['login'];
@$email = $_REQUEST['email'];
@$senha = $_REQUEST['password'];
@$con_senha = $_REQUEST['password_confirmation'];

if($nome == "" || $sobrenome == "" || $email == "" || $senha == "" || $con_senha == ""){
   header("Location: novo_usuario.php?resp=-2");
}elseif(strcmp($senha, $con_senha)){

    header("Location: novo_usuario.php?resp=-3");
    $x=1;
}
$nome_completo = "$nome  $sobrenome";

$sql_confere_nome = $conecta->query("SELECT login FROM sync_usuarios where login = '$login' ");

$i = $sql_confere_nome->fetch_row();

if($i[0] == NULL){

       $sql_cadastra_usu =  $conecta->query("INSERT INTO syncron.sync_usuarios(email,senha,nome_completo,login, status)
                        VALUES ('$email','$senha','$nome_completo','$login', 'A')");

        if($sql_cadastra_usu > 0){
            $sql1 = $conecta->query("INSERT INTO syncron.sync_diretorios(codigo_usuario,descricao)
                             VALUES((select codigo_usuario from sync_usuarios where login = '$login' and senha = '$senha'),
                             '/opt/$login/')");

        mkdir("/opt/$login") or die ("erro ao criar diretorio");
        mkdir("/opt/$login/documentos") or die ("erro ao criar diretorio musica");
        mkdir("/opt/$login/compartilhado") or die ("erro ao criar diretorio compartilhado");
        $enviado = 1;
        }

        /*$senha_aleatorio = rand(10000,99999);
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "syncron.suporte@gmail.com";
        $mail->Password = "4f9bba0717";
        $mail->From = "syncron.suporte@gmail.com";
        $mail->FromName = "Syncron";

        $mail->AddAddress($email,$nome_completo);
        $mail->isHTML(true);
        $mail->Subject = "Envio de Senha";
        //$mail->AltBody = "Esta e sua senha \r \n";
        $mail->Body = "Esta e sua senha $senha_aleatorio \r \n";
        //$enviado = $mail->send();
        //$mail->clearAllRecipients();
        $mail->clearAttachments();*/

        if($enviado==1){
            header("Location: novo_usuario.php?resp=1");
            //echo " Sua senha foi enviada para seu email.";
        }else{
            header("Location: novo_usuario.php?resp=2");
            //$mail->ErroInfo;
            //echo " Nao foi possivel enviar email com a senha.";
        }
}
else{
        header("Location: novo_usuario.php?resp=-1");
}

?>
