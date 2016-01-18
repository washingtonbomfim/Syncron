<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Syncron</title>

    <!-- Bootstrap -->
    <link href="../css/Painel.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
   <script src="..js/jquery-2.1.3.min.js" type="text/javascript"></script>
   <script src="../js/script.js"></script>

<style type="text/css">

/*
Free App template for Bootstrap 3
Code snippet by maridlcrmn for Bootsnipp.com
Follow me on Twitter @maridlcrmn
Image credits: unsplash.com
Image placeholders: placemi.com
*/


.mt-100 {
    margin-top: 100px; 
}
.mb-100 {
    margin-bottom: 100px;
}

.icon {
    width: 32px;
    height: 32px;
    text-align: center;
    padding: 7px 8px;
    border: 2px solid;
    border-radius: 50%;
}

.header {
    padding-top: 50px;
    background-color: #eee;
    overflow: hidden;
	min-height:800px;
	border-bottom:1px solid #ccc;
}
.footer {
    color: #887;
    padding-top: 30px;
    padding-bottom: 30px;
	border-bottom:1px solid #eee;
}

.content {
    position: relative;
    display: table;
    width: 100%;
    min-height: 100vh;
}
.pull-middle {
    display: table-cell;
    vertical-align: middle;
}

.btn {
    padding-left: 25px;
    padding-right: 25px;
}
.btn-circle {
    border-radius: 20px;
}
.btn-upload {
    border-radius: 100px;
	background:url(../img/icn-down.png) no-repeat center #3C59E6;
	width:150px;
	height:150px;
}
.btn-upload:hover {
    border-radius: 100px;
	background:url(../img/icn-down-hover.png) no-repeat center #3C59E6;
	width:155px;
	height:155px;
	margin-top:-2px;
}

.input-group input {
    border: 0;
    box-shadow: none;
    padding-right: 30px;
}
.input-group input:focus,
.input-group input:active {
    outline: 0;
    box-shadow: none;
}
.input-group-btn:last-child>.btn {
    z-index: 2;
    margin-left: -18px;   
    border-radius: 20px;
}

.phone {
    position: relative;
    max-width: 263px;
    margin: 0 auto;
    padding: 65px 15px 55px;
    border: 2px solid #ddd;
    border-radius: 20px;
    background-color: #222;
    box-shadow: 20px 20px 40px #887;
}
.center-home{
	margin:0 auto;
	padding:0;
	}
</style>
</head>
    <body>
	<div class="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="home.php" class="navbar-brand text-uppercase">SYNCRON</a><a class="navbar-brand text-uppercase" href="musicas.php"><span class="label btn-primary text-capitalize">Meus Arquivos</span></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="nav navbar-nav navbar-right">
                <li><button type="button" class="btn btn-primary navbar-btn btn-circle">
                		<span><img style="width:15px; height:15px; margin-top:-5px" src="../img/icn-usr.png"/></span> &nbsp;&nbsp;<? echo $_SESSION['login']; ?>
                    </button>
                </li>
                <li><a href="../adm/logout.php">Sair</a></li>
            </ul>
        </div>
      </div>
    </nav>
    
    
