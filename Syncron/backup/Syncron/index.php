<?php
	@$retorno_autentica = $_REQUEST['retorno'];
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Syncron</title>

    <!-- Bootstrap -->
    <link href="css/Painel.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

</head>
    <body>
    
        <div class="content-wrapper">
    <div class="container">
       <div class="row">
            <div class="col-md-3">

                </div>
                <div class="col-md-6">
                	<div class="panel panel-primary">
                            <?php
								if($retorno_autentica == 1)
								{									
									echo "<p class='erro_login'>Usuário ou Senha inválidos!</p>";									
								}
								else
								{
									echo "<p class='erro_login'>Por favor digite o login e senha!</p>";
								}
							?>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-login">
                            
                        </div>
                        <h1 class="logo">
                            <center><img src="img/logo-cloud.png" /></center>
                        </h1>
                        <hr class="linha">
                        <div class="panel-body">
                            <form action="bd/autenticar.php" method="post">
                            	Usuário:
                                <div class="form-group">
                                    <input type="text" class="form-control" name="inputUsuario" placeholder="Digite o seu usuário" />
                                </div>
                                <div class="form-group">
                                	Senha:
                                    <input type="password" class="form-control" name="inputSenha" placeholder="Digite a sua senha" />
                                </div>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary">Entrar</button>
                            </form>
                            <a href="adm/novo_usuario.php">Novo usuario</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">


                </div>
            </div>
         </div>
            </div>
    
    </body>
</html>
