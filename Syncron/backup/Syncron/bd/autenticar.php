<?php

//CONECTA COM O BANCO DE DADOS
    require_once("conecta.php");

//RECEBE OS DADOS DO FORMULARIO
    $usuario   =   $_REQUEST['inputUsuario'];
    $senha     =   $_REQUEST['inputSenha'];
//INICIALIZA A SESSAO
	session_start();
//VERIFICA
         $sql = ("SELECT codigo_usuario,nome_completo,login ,senha
		             FROM sync_usuarios
		   	         WHERE login = '$usuario'
			         and senha = '$senha'");
//VERIFICA SE RETORNOU ALGO
    $result = $conecta->query($sql);

        if($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            //GRAVA AS VARIAVEIS NA SESSAO
                $_SESSION['codigo_usuario'] = $row["codigo_usuario"];
                $_SESSION['nome_completo'] = $row["nome_completo"];
	            $_SESSION['login'] = $row["login"];
	            $_SESSION['senha'] = $row["senha"];
	        }

            $cod = $_SESSION['codigo_usuario'];
            $dir = $conecta->query("select descricao,codigo_diretorio from sync_diretorios
                                    where codigo_usuario ='$cod'");

                while ($i = $dir->fetch_assoc()) {
                $_SESSION['uploaddir'] = $i['descricao'];
                $_SESSION['codigo_diretorio'] = $i['codigo_diretorio'];
            }
            header("Location: ../adm/home.php");

        }else{
            $retorno = 1;
    header("Location: ../index.php?retorno=$retorno");
    session_destroy();
        }
    $conecta->close();
?>
