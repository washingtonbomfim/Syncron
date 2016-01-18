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
                <strong>Parabéns!</strong> Sua senha foi enviada para seu email..
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
                <strong>Aviso!</strong> Nao foi possivel enviar email com a senha..
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
                <strong>Aviso!</strong> Existe um usuario com este Login, favor informar um diferente..
            	</div>
        		</div>
				</div>
				</div>";
		}
	?>

<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="cadastra_novo_usuario.php" method="post">
			<h2>Cadastre-se <small>É gratuito.</small></h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="primeiro_nome" id="nome" class="form-control input-lg" placeholder="First Name" required="true" tabindex="1">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="sobrenome" id="sobrenome" class="form-control input-lg" placeholder="Last Name" required="true" tabindex="2">
					</div>
				</div>
			</div>
			<div class="form-group">
                        <input type="text" name="login" id="login" class="form-control input-lg" placeholder="Nome para Login" required="true" tabindex="3">
					</div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" required="true" tabindex="4">
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required="true" tabindex="5">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" required="true" tabindex="6">
					</div>
				</div>
			</div>
			<div class="row">
				
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-6 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<div class="col-xs-6 col-md-6"><a href="../index.php" class="btn btn-success btn-block btn-lg">Entrar</a></div>
			</div>
		</form>
	</div>
</div>
<!-- Modal -->

</div>
</body>
</html>