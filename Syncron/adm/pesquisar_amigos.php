<?php

session_start();
include "cabecalho.php";
include "modals.php";
include '../bd/conecta.php';

@$tipo = $_REQUEST['tipo'];
@$pesquisa = $_REQUEST['pesquisa'];
@$erro = $_REQUEST['erro'];
$codigo_usuario = $_SESSION['codigo_usuario'];

?>
<br />
<br /><br />
    <div class="row">
        <div class="col-md-12">
            <section class="panel panel-primary">
                <header class="panel-heading">
                    

                    <h2 class="panel-title">Consulta de Amigos</h2>
                </header>
                <div class="panel-body" style="display: block;">
                    <form action="?tipo=1" method="post">
                        <div class="form-group">
                         <br />
                            <label class="col-md-1 control-label text-right" for="pesquisa">Pesquisar:</label>
                            <div class="col-md-8">
                            <input type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="Pesquisar Amigos">
                         </div>
                                <input class="btn btn-primary col-md-2" style="float:right;" type='submit' value='Consultar' class='buttom'/>
                        </div>
                    </form>
                    <div class="form-group">
                        <div class="col-md-12">
                            <hr />
                        </div>
                    </div>
                    <div class="form-group" >
                        <div class="col-md-12">
                        <div class="table-responsive">
                        <?php if(isset($tipo)) { //arquivo do tipo musica ?>
            <table class="table table-bordered table-striped table-condensed mb-none">
                <thead>
                <tr>             
                <th class="text-center">Nome</th>
                <th class="text-center">Email</th>
                <th class="text-center">Adicionar</th>
                </tr>
                </thead>
                
               <?php
                if ($tipo == 1) { //arquivo do tipo musica
                    if ($pesquisa== "") {
                        $result = $conecta->query("select codigo_usuario, nome_completo, email from sync_usuarios where status = 'A' and codigo_usuario <> ".$codigo_usuario);
                    } else {
                        $result = $conecta->query("select codigo_usuario,nome_completo, email from sync_usuarios "
                                                . "where status = 'A' and nome_completo like '%".$pesquisa."%'"."and codigo_usuario <> ".$codigo_usuario);
                    }                    

                    while ($linha = $result->fetch_row()){
                        ?><tr>
                            <td><?php echo $linha[1]; ?></td>
                            <td class="text-center"><?php echo $linha[2]; ?></td>
                            <td class="text-center" align="center"><a href="adiciona_amigo.php?id=<?php echo $linha[0] ?>&tipo=1"><img src="../img/add.png" width="28"/></a></td>
                        </tr>

                        <?php
                    }
                    $conecta->close();
                }
                ?>
                
            </table>
            <?php } ?>
            </div>
            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
                
            </section>
        </div>
    
    
    </div>
<?php
include "rodape.php";
?>