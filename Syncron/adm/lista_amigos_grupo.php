<?php

session_start();
include "cabecalho.php";
include "modals.php";
include '../bd/conecta.php';

@$return = $_REQUEST['return'];
@$tipo = $_REQUEST['tipo'];
@$pesquisa = $_REQUEST['pesquisa'];
@$erro = $_REQUEST['erro'];
$codigo_usuario = $_SESSION['codigo_usuario'];

if(isset($_REQUEST["cod_grupo"])){
    $codigo_form  = $_REQUEST["cod_grupo"];

}

?>

<?php
        if($return == -1){
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong>Aviso!</strong> Não foi possivel adicionar alguns amigos ao Grupo. Favor verificar e vincular novamente.
                </div>
                </div>
                </div>
                </div>";                                    
        }elseif($return == 1){
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong></strong> Amigos vinculados com sucesso!
                </div>
                </div>
                </div>
                </div>";
            }elseif($return == 2){
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong></strong> Amigo removido do Grupo!
                </div>
                </div>
                </div>
                </div>";
            }elseif($return == -2){
            echo "<div class='container'>
                 <div class='row'>
                <div class='alert-group'>
                <div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <strong></strong> Não foi possivel remover amigo do grupo.
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
                    

                    <h2 class="panel-title">Consulta de Amigos em Grupo</h2>
                </header>
                <div class="panel-body" style="display: block;">
                    <form action="?tipo=1" method="post">
                        <div class="form-group">
                         <br />
                            <label class="col-md-1 control-label text-right" for="pesquisa">Pesquisar Grupo:</label>
                            <div class="col-md-9">
                		<select class="form-control" data-plugin-multiselect name="cod_grupo">
                		<?php
                		$results = $conecta->query("select id_grupo, nome_grupo from syncron.sync_grupos
                                                    where status = 'A'
                                                    and codigo_usuario_criacao = " .$_SESSION['codigo_usuario']);
                    	while ($rs = $results->fetch_row()) 
                   		 {
                    	?>
                        <option value= "<?php echo $rs[0] ?>"><?php echo $rs[1] ?></option>
                   		 <?php } ?>
                   			 </select>
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
                <th class="text-center">Login</th>
                <th class="text-center">Grupo</th>
                <th class="text-center">Remover</th>
                </tr>
                </thead>
                
               <?php
                if ($tipo == 1) { //arquivo do tipo musica
                        $result = $conecta->query("select codigo_usuario, nome_completo, login from sync_usuarios where codigo_usuario in 
                            (select codigo_usuario from sync_grupo_usuarios where codigo_grupo = " .$codigo_form." and status = 'A')");
                        $nomegrupo =  $conecta->query("select nome_grupo from sync_grupos where status = 'A' and id_grupo= ".$codigo_form);
                        
                        while ( $x = $nomegrupo->fetch_row()) {
                           $y = $x[0]; //so pra pegar o nome do grupo... tem que fazer algo mais elegante
                        }                               

                    while ($linha = $result->fetch_row()){
                        ?><tr>
                            <td><?php echo $linha[1]; ?></td>
                            <td class="text-center"><?php echo $linha[2]; ?></td>
                            <td class="text-center"><?php echo $y; ?></td>
                            <td class="text-center" align="center"><a href="remove_amigo_grupo.php?cod_user=<?php echo $linha[0] ?>&tipo=3&cod_grup=<?php echo $codigo_form ?>"><img src="../img/delete.png" width="28"/></a></td>
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