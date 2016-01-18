<html>
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

<form action="adm/cadastra_novo_usuario.php" method="post">

    <div class="form-group">
        Primeiro Nome:
        <input type="text" class="form-control" name="nome" placeholder="Digite o seu nome" />
        Ultimo nome:
        <input type="text" class="form-control" name="sobrenome" placeholder="Digite o seu sobrenome" /></br>
        Email:
        <input type="text" class="form-control" name="email" placeholder="email" /></br>
        Senha:
        <input type="text" class="form-control" name="senha" placeholder="senha" /></br>
        Confirmar Senha:
        <input type="text" class="form-control" name="con_senha" placeholder="confirmar senha" />
    </div>
    <div class="panel-footer">
        <button class="btn btn-primary">Enviar</button>
    </div>
</form>


</body>




</html>