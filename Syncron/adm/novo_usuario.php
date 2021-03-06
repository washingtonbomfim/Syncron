<?php
	@$resp = $_REQUEST['resp'];
?>
<html>
<head>
	<title>Syncron</title>
    
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Syncron</title>
	
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="css/sb-admin.css" rel="stylesheet">
	<link href="../css/fullscreen.css" rel="stylesheet"	>
	<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css" />

    <link rel="stylesheet" href="../css/style.css" />		
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="../css/theme.css" />
    <link rel="stylesheet" href="../css/themaPadrao.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">

	<link rel="stylesheet" href="../css/select2-bootstrap.css">
	<link rel="stylesheet" href="../css/select2.css">
	
    <script src="../js/jquery.min.js"></script>		
	<script src="../js/bootstrap.js"></script>		

	<script src="../js/select2.js"></script>
	<script src="../js/jquery-placeholder.js"></script>

	<script src="../js/theme.admin.extension.js"></script>
		
		<!-- Admin Extension Examples -->
	<script type="text/javascript">
	
        $(document).ready(function()
        {
            $("#myModalProcedimento").modal("show");
        });
    </script>	
</head>

<body>

	<?php
		if($resp == 1){
			echo "<div class='container'>
				 <div class='row'>
				<div class='alert-group'>
            	<div class='alert alert-success alert-dismissable'>
                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Parabéns!</strong> Perfil criado com sucesso. Favor voltar a tela de Login para acessar o sistema.
            	</div>
        		</div>
				</div>
				</div>";									
		}elseif ($resp == 2) {
			echo "<div class='container'>
				 <div class='row'>
				<div class='alert-group'>
            	<div class='alert alert-danger alert-dismissable'>
                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Aviso!</strong> Ocorreu um erro ao criar o seu perfil.. Favor entrar em contato com o Administrador.
            	</div>
        		</div>
				</div>
				</div>";
		}elseif ($resp == -1) {
			echo "<div class='container'>
				 <div class='row'>
				<div class='alert-group'>
            	<div class='alert alert-warning alert-dismissable'>
                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Aviso!</strong> Existe um usuario com este login, favor informar um diferente..
            	</div>
        		</div>
				</div>
				</div>";
		}elseif ($resp == -2) {
			echo "<div class='container'>
				 <div class='row'>
				<div class='alert-group'>
            	<div class='alert alert-warning alert-dismissable'>
                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Aviso!</strong> Favor preencher todos os campos...
            	</div>
        		</div>
				</div>
				</div>";
		}elseif ($resp == -3) {
			echo "<div class='container'>
				 <div class='row'>
				<div class='alert-group'>
            	<div class='alert alert-warning alert-dismissable'>
                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Aviso!</strong> As Senhas informadas são diferentes! Favor corrigir. 
            	</div>
        		</div>
				</div>
				</div>";
		}
	?>

<section class="body-sign">
			<div class="center-sign">
				

				<div class="panel panel-sign">
                <p class="text-left text-muted mt-md mb-md"><a href="/teste/" >
					<img src="../img/logo-cloud.png" height="89" alt="Syncron" />
				</a></p>
					
					<div class="panel-body">                    	
						<form role="form" action="cadastra_novo_usuario.php" method="post">
			<h2 class="panel-title">Cadastre-se</h2>
						<p class="panel-subtitle">É gratuito!</p>
			<hr class="colorgraph">
			<div class="row">
            	<div class="form-group">
					<div class="col-md-6">
                        <input type="text" name="primeiro_nome" id="nome" class="form-control input-lg" placeholder="Primeiro Nome" required="true" tabindex="1">
					</div>
				
					<div class="col-md-6">
						<input type="text" name="sobrenome" id="sobrenome" class="form-control input-lg" placeholder="Sobrenome" required="true" tabindex="2">
					</div>
				</div>
			</div>
            <div class="row">
                <div class="form-group">
                	<div class="col-md-12">
                    	<input type="text" name="login" id="login" class="form-control input-lg" placeholder="Nome para Login" required="true" tabindex="3">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                	<div class="col-md-12">
                    	<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" required="true" tabindex="4">
                    </div>
                </div>
            </div>
			<div class="row">
            	<div class="form-group">
					<div class="col-md-6">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Senha" required="true" tabindex="5">
					</div>
					<div class="col-md-6">
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirmar Senha" required="true" tabindex="6">
					</div>
				</div>
			</div>
			<div class="row">
				
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-6 col-md-6"><input type="submit" value="Cadastrar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<div class="col-xs-6 col-md-6"><a href="../index.php" class="btn btn-success btn-block btn-lg">Voltar</a></div>
			</div>
		</form>
					</div>
				</div>

			</div>
<!-- Modal -->

</div>
</body>
</html>