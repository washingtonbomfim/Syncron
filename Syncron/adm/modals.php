<?php
include '../bd/conecta.php';
session_start();
?>
<head>
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
<!--INICIO MODAL ENVIO ARQUIVO-->

<div class="modal fade" id="idModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Upload</h3>
            </div>
            <div class="modal-body">

                <!-- content goes here -->
                <form action="ctrl_enviar_arquivo.php?tipo_arquivo=1" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label >Selecionar Arquivo</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="134217728">
                        <input name="userfile" type="file" >
                        <p class="help-block">Somente Arquivos menores que 200Mb.</p>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"  role="button">Cancelar</button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="submit" id="saveImage" class="btn btn-success btn-hover-green" data-action="save" role="button">Enviar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- TERMINO DO MODAL DE ENVIO DE ARQUIVO------>
<!--INICIIO MODAL CADASTRA GRUPO-->
﻿<div class="modal fade" id="MdlCadastraGrupo" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Grupo de Amigos</h3>
            </div>
            <form action="cadastra_grupo.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label >Cadastrar Grupo</label>
                        <input type="text" name="nome_grupo" class="form-control" placeholder="Nome grupo" required>
                        <div class="hr col-lg-12">
                            <br/>
                        </div>
                    </div>
                    <label >Grupos Cadastrados</label>
                    <div class="form-group">
                        <ul class="list-group">
                            <?php
                            $results = $conecta->query("select id_grupo , nome_grupo from sync_grupos where codigo_usuario_criacao =" . $_SESSION['codigo_usuario'] . " and status = 'A' and nome_grupo is not null");
                            while ($linhas = $results->fetch_row()) {
                                ?>
                                <li class="list-group-item">
                                    <?php echo $linhas[1]; ?>                        
                                    <ul class="list-group-submenu">
                                        <a href="remove_amigo_grupo.php?tipo=2&cod_grup=<?php echo $linhas[0] ?>"><li class="list-group-submenu-item danger"><span class="glyphicon glyphicon-remove"></span></li></a>
                                        <!--<li class="list-group-submenu-item success"><span class="glyphicon glyphicon-ok"></span></li>-->
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group btn-group-justified" role="group" aria-label="group button">

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"  role="button">Cancelar</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="submit" id="saveImage" class="btn btn-success btn-hover-green" data-action="save" role="button">Cadastrar</button>
                        </div>
                    </div>
            </form>
        </div>

    </div>
</div>
</div>

<!-- TERMINO DO CADASTRA GRUPO -->
<!-- INICIO CADASTRO DE AMIGO -->
﻿<div class="modal fade" id="MdlCadastraAmigo" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Lista de Amigos</h3>
            </div>
            <form action="listar_amigos.php" method="post">
                <div class="modal-body">
                    <label >Amigos</label>
                    <div class="form-group">
                        <ul class="list-group">
                            <?php
                            $results = $conecta->query("select codigo_usuario, login from sync_usuarios
                                                        where codigo_usuario in (select codigo_amigo from sync_amigos
                                                        where status = 'A' and codigo_usuario = " . $_SESSION['codigo_usuario'] . " )");
                            while ($linhas = $results->fetch_row()) {
                                ?>
                                <li class="list-group-item">
                                    <?php echo $linhas[1]; ?>                        
                                    <ul class="list-group-submenu">
                                        <a href="remove_amigo_grupo.php?tipo=1&cod_user=<?php echo $linhas[0] ?>"><li class="list-group-submenu-item danger"><span class="glyphicon glyphicon-remove"></span></li></a>
                                        <!--<li class="list-group-submenu-item success"><span class="glyphicon glyphicon-ok"></span></li>-->
                                    </ul>
                                </li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group btn-group-justified" role="group" aria-label="group button">

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"  role="button">Sair</button>
                        </div>
                    </div>

            </form>
        </div>

    </div>
</div>
</div>
<!-- TERMINO DO CADASTRO DE AMIGO-->
<!--PERGUNTA COM QUEM QUER COMPARTILHAR O ARQUIVO-->
<div class="modal fade" id="MdlCompatilha" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Com quem deseja Compartilhar este arquivo?</h3>
            </div>
            <div class="modal-body">
            
                <div id="mostraAmigo">
                <form action="compartilha_arquivo_amigo_grupo.php" method="post" >
                 <div class="funkyradio">  
                    <?php
                            $rs = $conecta->query("select codigo_usuario, login from sync_usuarios
                                                   where codigo_usuario in (select codigo_amigo from sync_amigos
                                                   where status = 'A' and codigo_usuario = " . $_SESSION['codigo_usuario'] . " )");
                            while ($linhas = $rs->fetch_row()) {
                    ?>
                  
                    <div class="funkyradio-success">
                        <input type="checkbox" name="checkboxAmigo[]" value="<?php echo $linhas[0]?>" id="<?php echo $linhas[0]?>" checked/>
                        <label for="<?php echo $linhas[0]?>"><?php echo $linhas[1]?></label>
                    </div>
                  
                    <?php } ?>
                </div>
                 <div class="btn-group" role="group">
                        <button id="compA" type="submit" class="btn btn-success btn-md" data-action="save"  role="button">Compartilhar</button>
                    </div>
                    </form>           
                </div>
                <div id="mostraGrupo">
                <form action="compartilha_arquivo_amigo_grupo.php" method="post" >
                  <div class="funkyradio">  
                    <?php
                            $rs = $conecta->query("select id_grupo, nome_grupo from sync_grupos where codigo_usuario_criacao = " .$_SESSION['codigo_usuario']);
                            while ($linhas = $rs->fetch_row()) {
                    ?>
                    <div class="funkyradio-success">
                        <input type="checkbox" name="checkbox" value="<?php echo $linhas[0]?>" id="<?php echo $linhas[0]?>" checked/>
                        <label for="<?php echo $linhas[0]?>"><?php echo $linhas[1]?></label>
                    </div>
                    <?php } ?>
                    </div>
                     <div class="btn-group" role="group">
                        <button id="compG" type="submit" class="btn btn-success btn-md" data-action="save"  role="button">Compartilhar</button>
                    </div>
                    </form>
                </div>
                 </div>

            <div class="modal-footer">
                <div class="btn-group btn-group-justified" role="group" aria-label="group button">

                    <div class="btn-group" role="group">
                        <button id="amigos" type="button" class="btn btn-success btn-md" data-action="save"  role="button">Amigos</button>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="grupos" type="submit" id="saveImage" class="btn btn-info btn-md" data-action="save" role="button">Grupos</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--FIM DE PERGUNTA COM QUEM QUER COMPARTILHAR O ARQUIVO-->
<!--VINCULA AMIGO A GRUPO CRIADO-->
<form action="vincula_amigo_grupo.php" method="post">
<div class="modal fade" id="MdlVinculaAmigos" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Escolha o Grupo e Amigos para vincular</h3>
            </div>
            <br/>
            <div class="modal-header">

              <div class="form-group">
             <label class="col-md-3 control-label">Grupos</label>
                <div class="col-md-6">
                <select class="form-control" data-plugin-multiselect name="cod_grupo">
                <?php
                $results = $conecta->query("select id_grupo, nome_grupo from syncron.sync_grupos
                                            where status = 'A'
                                            and codigo_usuario_criacao = "  .$_SESSION['codigo_usuario']);
                    while ($rs = $results->fetch_row()) 
                    {
                    ?>
                        <option value= "<?php echo $rs[0] ?>"><?php echo $rs[1] ?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
                
            <br/>
            </div>
            <div class="modal-header">
                <div class="form-group">
                    <label class="col-md-3 control-label">Amigos</label>
                    <div class="col-md-6">
                        <div class="multiselect ">
                            <div class="selectBox" onclick="showCheckboxes()">
                                <select class="form-control">
                                    <option>Selecione os amigos</option>
                                </select>
                                <div class="overSelect"></div>
                            </div>
                            <div id="checkboxes">
                            <?php
                            $results = $conecta->query("select codigo_usuario, login from sync_usuarios
                                                        where codigo_usuario in (select codigo_amigo from sync_amigos
                                                        where codigo_usuario = " .$_SESSION['codigo_usuario'].
                                                        " and status = 'A')");
                                while ($rs = $results->fetch_row()) 
                                {
                            ?>
                                    <label for="<?php echo $rs[0] ?>" ><input type="checkbox" name="cod[]" value="<?php echo $rs[0] ?>"/> <?php echo $rs[1] ?></label>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <br/>
            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-warning btn-md" data-dismiss="modal" role="button">Cancelar</button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="submit" id="saveImage" class="btn btn-success btn-md" data-action="save" role="button">Vincular</button>
                    </div>
                </div>
              
            </div>

        </div>
    </div>
</div>
</form>
<!-- FIM VINCULA AMIGO A GRUPO-->


<?php $conecta->close(); ?>