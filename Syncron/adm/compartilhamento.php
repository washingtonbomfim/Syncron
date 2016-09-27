<?php
include '../bd/conecta.php';
include "cabecalho.php";
session_start();
@$tipo = $_REQUEST['tipo'];
@$descricao = $_REQUEST['descricao'];
@$idarq = $_REQUEST['id'];

?><head>
    <style type="text/css">


.list-group {
  overflow: hidden;
  border-left: 1px solid rgb(221, 221, 221);
  border-right: 1px solid rgb(221, 221, 221);
}
.list-group-item:first-child, .list-group-item:last-child {
  border-top-right-radius: 0px;
  border-top-left-radius: 0px;
  border-bottom-right-radius: 0px;
  border-bottom-left-radius: 0px;
  overflow: hidden;
}
.list-group-item {
  border-left: 0px solid rgb(221, 221, 221);
  border-right: 0px solid rgb(221, 221, 221);
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
}
.list-group-item > .show-menu {
  position: absolute;
  height: 100%; width:24px;
  top: 0px; right: 0px;
  background-color: rgba(51, 51, 51, 0.2);
  cursor: pointer;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
}
.list-group-item > .show-menu > span {
  position: absolute;
  top: 50%;
  margin-top: -7px;
  padding: 0px 5px;
}
.list-group-submenu {
  position: absolute;
  top: 0px;
  right: -88px;
  white-space: nowrap;
  list-style: none;
  padding-left: 0px;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
}
.list-group-submenu .list-group-submenu-item {
  float: right;
  white-space: nowrap;
  display: block;
  padding: 10px 15px;
  margin-bottom: -1px;
  background-color: rgb(51, 51, 51);
  color: rgb(235, 235, 235);
}
.list-group-item.open {
  margin-left: -88px;
}
.list-group-item.open > .show-menu {
  right: 88px;
}
.list-group-item.open .list-group-submenu{
  right: 0px;
}
.list-group-submenu .list-group-submenu-item.primary {
  color: rgb(255, 255, 255);
  background-color: rgb(50, 118, 177);
}
.list-group-submenu .list-group-submenu-item.success {
  color: rgb(255, 255, 255);
  background-color: rgb(92, 184, 92);
}
.list-group-submenu .list-group-submenu-item.info {
  color: rgb(255, 255, 255);
  background-color: rgb(57, 179, 215);
}
.list-group-submenu .list-group-submenu-item.warning {
  color: rgb(255, 255, 255);
  background-color: rgb(240, 173, 78);
}
.list-group-submenu .list-group-submenu-item.danger {
  color: rgb(255, 255, 255);
  background-color: rgb(217, 83, 79);
}

    
.funkyradio div {
  clear: both;
  overflow: hidden;
}

.funkyradio label {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #D1D3D4;
  font-weight: normal;
}

.funkyradio input[type="radio"]:empty,
.funkyradio input[type="checkbox"]:empty {
  display: none;
}

.funkyradio input[type="radio"]:empty ~ label,
.funkyradio input[type="checkbox"]:empty ~ label {
  position: relative;
  line-height: 2.5em;
  text-indent: 3.25em;
  margin-top: 2px;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.funkyradio input[type="radio"]:empty ~ label:before,
.funkyradio input[type="checkbox"]:empty ~ label:before {
  position: absolute;
  display: block;
  top: 0;
  bottom: 0;
  left: 0;
  content: '';
  width: 2.5em;
  background: #D1D3D4;
  border-radius: 3px 0 0 3px;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #C2C2C2;
}

.funkyradio input[type="radio"]:checked ~ label,
.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
}

.funkyradio input[type="radio"]:checked ~ label:before,
.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}

.funkyradio input[type="radio"]:focus ~ label:before,
.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}

.funkyradio-default input[type="radio"]:checked ~ label:before,
.funkyradio-default input[type="checkbox"]:checked ~ label:before {
  color: #333;
  background-color: #ccc;
}

.funkyradio-primary input[type="radio"]:checked ~ label:before,
.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;
}

.funkyradio-success input[type="radio"]:checked ~ label:before,
.funkyradio-success input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5cb85c;
}

.funkyradio-danger input[type="radio"]:checked ~ label:before,
.funkyradio-danger input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #d9534f;
}

.funkyradio-warning input[type="radio"]:checked ~ label:before,
.funkyradio-warning input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #f0ad4e;
}

.funkyradio-info input[type="radio"]:checked ~ label:before,
.funkyradio-info input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5bc0de;
}

    </style>
    <script type="text/javascript">
        $(function () {
            $('.list-group-item').on('mouseover', function (event) {
                event.preventDefault();
                $(this).closest('li').addClass('open');
            });
            $('.list-group-item').on('mouseout', function (event) {
                event.preventDefault();
                $(this).closest('li').removeClass('open');
            });
        });
    </script>
</head>

<div class="content">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Com quem deseja Compartilhar este arquivo?<br> <?php echo $descricao; ?></h4>
            </div>
            <div class="modal-footer">
            <div class="btn-group btn-group-justified">
					 <form action="#" method="POST">
                        <div class="btn-group col-lg-6">
                            <button type="submit" id="butAdmigos" name="butAdmigos" class="btn btn-success ">Amigos</button>
                        </div>
                        <div class="btn-group col-rg-6">
                            <button type="submit" id="butGrupos" name="butGrupos" class="btn btn-info btn-md">Grupos</button>
                        </div>
                    </form>
                </div>
                
            </div>

            <div class="modal-body">
            <?php 
				if(isset($_POST["butAdmigos"])){ ?>
                
                <div id="mostraAmigo">
                <form action="compartilha_arquivo_amigo_grupo.php" method="post" >
                <input type="hidden" name="verifica" value="1" />
                <input type="hidden" name="descricao" value="<?php echo $descricao ?>" />
                <input type="hidden" name="idarq" value="<?php echo $idarq ?>" />
                 <div class="funkyradio">  
                    <?php
                            $rs = $conecta->query("select codigo_usuario, login from sync_usuarios
                                                   where codigo_usuario in (select codigo_amigo from sync_amigos
                                                   where status = 'A' and codigo_usuario = " . $_SESSION['codigo_usuario'] . " )");
                            while ($linhas = $rs->fetch_row()) {
                    ?>
                  
                    <div class="funkyradio-success">
                        <input type="checkbox" name="checkboxAmigo[]" value="<?php echo $linhas[0]?>" id="checkbox<?php echo $linhas[0]?>" checked/>
                        <label for="checkbox<?php echo $linhas[0]?>"><?php echo $linhas[1]?></label>
                    </div>
                  
                    <?php } ?>
                </div>
                 <div class="btn-group" role="group">
                        <button id="compA" type="submit" class="btn btn-primary" data-action="save"  role="button">Compartilhar</button>
                    </div>
                    </form>           
                </div>
                <?php } ?>
                
                 <?php 
				if(isset($_POST["butGrupos"])){ ?>
                
                <div id="mostraGrupo">
                <form action="compartilha_arquivo_amigo_grupo.php" method="post" >
                <input type="hidden" name="descricao" value="<?php echo $descricao ?>" />
                <input type="hidden" name="idarq" value="<?php echo $idarq ?>" />
                <input type="hidden" name="verifica" value="2" />
                  <div class="funkyradio">  
                    <?php
                            $rs = $conecta->query("select id_grupo, nome_grupo from sync_grupos where codigo_usuario_criacao = " .$_SESSION['codigo_usuario']);
                            while ($linhas = $rs->fetch_row()) {
                    ?>
                    <div class="funkyradio-success">
                        <input type="checkbox" name="checkboxGrupo[]" value="<?php echo $linhas[0]?>" id="checkbox<?php echo $linhas[0]?>" checked/>
                        <label for="checkbox<?php echo $linhas[0]?>"><?php echo $linhas[1]?></label>
                    </div>
                    <?php } ?>
                    </div>
                     <div class="btn-group" role="group">
                        <button id="compG" type="submit" class="btn btn-primary btn-md" data-action="save"  role="button">Compartilhar</button>
                    </div>
                    </form>
                </div>
                <?php } ?>
			</div>
        </div>
    </div>
</div>
<?php $conecta->close(); ?>