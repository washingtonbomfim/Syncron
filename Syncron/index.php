
<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Syncron Admin">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="css/bootstrap.css" />

		<link rel="stylesheet" href="css/style.css" />		
        
		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css" />
        <link rel="stylesheet" href="css/themaPadrao.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
		
	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				

				<div class="panel panel-sign">
                <p class="text-left text-muted mt-md mb-md"><a href="/teste/" >
					<img src="img/logo-cloud.png" height="64" alt="Syncron" />
				</a></p>
					
					<div class="panel-body">                    	
						<form action="bd/autenticar.php" method="post">
							<div class="form-group mb-lg">
								<label>Usuário</label>
								<div class="input-group input-group-icon">
									<input name="inputUsuario" type="text" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa icon-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								
								<div class="input-group input-group-icon">
									<input name="inputSenha" type="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa icon-lock"></i>
										</span>
									</span>
								</div>
							</div>
							<hr>
							<div class="row">
                            	<div class="col-sm-6 text-left">
									<button type="submit" class="btn btn-primary hidden-xs">ACESSAR SISTEMA</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">ACESSAR SISTEMA</button>
								</div>
								<div class="col-sm-6">
         <div class="checkbox-custom checkbox-default pull-right">
          <a href="adm/novo_usuario.php">Novo usuário?</a>
         </div>
        </div>
								
							</div>							
						</form>
					</div>
				</div>

			</div>
		</section>
		<!-- end: page -->

	</body>
</html>