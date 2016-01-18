<?php

session_start();
include "cabecalho.php";
include "modals.php";
include '../bd/conecta.php';

@$tipo = $_REQUEST['tipo'];
@$pesquisa = $_REQUEST['pesquisa'];
@$return = $_REQUEST['return'];

?>
<?php
        if($return == -1){
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Aviso!</strong> Não, favor tentar novamente ou entrar em contato com o Administrador da rede..
                </div>
                </div>
                </div>
                </div>";                                    
        }elseif ($return == 1) {
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong></strong> Arquivo excluido com sucesso..
                </div>
                </div>
                </div>
                </div>";
        }
?>
<br />
<br /><br />
	<div class="row">
        <div class="col-md-12">
            <section class="panel panel-primary">
                <header class="panel-heading">
                    

                    <h2 class="panel-title">Lista de Arquivos </h2>
                </header>
                <div class="panel-body" style="display: block;">
                    <form action="?tipo=1" method="post">
            			<div class="form-group">
                            <label class="col-md-1 control-label text-right" for="pesquisa">Pesquisar:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="Pesquisar Arquivos">
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
                <th>Nome</th>
                
                <th class="text-center">Download</th>
                <th class="text-center">Compartilhar</th>
                <th class="text-center">Excluir</th>
                </tr>
                </thead>
                
                <?php
                if($tipo == 1){
                    if (isset($pesquisa)) {
                        $result = $conecta->query("select codigo_arquivo, nome_arquivo from sync_arquivos
                                                   where tipo_arquivo = 1 and status = 'E' and codigo_usuario = " . $_SESSION['codigo_usuario']);
                    } else {
                        $result = $conecta->query("select codigo_arquivo, nome_arquivo from sync_arquivos
						   where codigo_usuario = " . $_SESSION['codigo_usuario'] . " and tipo_arquivo = 1
						   and status = 'E' and nome_arquivo like '%$pesquisa%'");
                    }                    

                    while ($linha = $result->fetch_row()){
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $linha[1]; ?></td>
                            
                            <td class="text-center"><a href="download.php?id=<?php echo $linha[0] ?>&tipo=1"><img src="../img/download.png" width="28"/></a></td>
                            <td class="text-center"><a data-toggle="modal" data-target="#MdlCompatilha"><img src="../img/share.png" width="28"/></a></td>
                            <td class="text-center"><a href="remove_arquivos.php?id=<?php echo $linha[0] ?>&tipo=1"><img src="../img/remove.png" width="28"/></a></td>
                        </tr>
</tbody>
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
                            <form action="enviar_arquivo.php" method="post">
                                
                                    <a data-toggle="modal" data-target="#idModal" class="btn btn-primary text-center">+ Adicionar</a>
                                
                            </form>
                        </div>
                    </div>
                </div>
                
            </section>
        </div>
    
    
    </div>

<?php
include "rodape.php";
?>