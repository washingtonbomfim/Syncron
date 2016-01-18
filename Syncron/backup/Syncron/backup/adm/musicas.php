<?php
	include '../bd/conecta.php';
    session_start();
    @$tipo = $_REQUEST['tipo'];
    @$pesquisa = $_REQUEST['pesquisa'];

    include "cabecalho.php";
	   
?>
<br/>
<br/><br/><br/>
        <center>
                <div style="width:50%; margin-top:50px;">
                    <div class="panel panel-primary">
						<div class="panel-heading">
                            Lista de Arquivos
                        </div>
                        <br/>
                            <form action="?tipo=1" method="post">
                                <div class="col-md-8"  style="width:100%">
                                <label style="float:left; padding:5px; margin-right:5px;">Pesquisar:</label>
                                <input type="text" class="form-control" style="width:60%; float:left;" name="pesquisa" placeholder="Pesquisar Arquivos" />
                                <input class="btn btn-primary" style="float:right;" type='submit' value='Consultar' class='buttom'/>
                                </div>
                            </form>

                            <br />
                            <br />
                            <br />
                            <div class="col-md-12">
                            	<hr class="linha"/>
                            </div>
                        <table class="table" style="width: 100%">

							<td><strong>Nome</strong></td>
                            <td><strong>Excluir</strong></td>
                            <td><strong>Download</strong></td>
                            <td><strong>Compartilhar</strong></td>

						</tr>
                        <?php
                           
						    $i = 0;
						    if($tipo == 1){ //arquivo do tipo musica

                                if($pesquisa == ""){
                                    $result = $conecta->query("select codigo_arquivo, nome_arquivo from sync_arquivos
							                           where tipo_arquivo = 1 and status = 'E' and codigo_usuario = ".$_SESSION['codigo_usuario']);
                                }else{
                                    $result = $conecta->query("select codigo_arquivo, nome_arquivo from sync_arquivos
							                           where codigo_usuario = ".$_SESSION['codigo_usuario']."and tipo_arquivo = 1
							                            and status = 'E' and nome_arquivo like '%$pesquisa%'");
                                }

							while($linha = $result->fetch_row()){	
						?><tr>
									
									<td><?php echo $linha[1];?></td>
									<td align="center"><a href="remove_arquivos.php?id=<?php echo $linha[0]?>&tipo=1"><img src="../img/remove.png" width="28"/></a></td>
                                    <td align="center"><a href="download.php?id=<?php echo $linha[0]?>&tipo=1"><img src="../img/download.png" width="28"/></a></td>
                                    <td align="center"><a href="share.php?id=<?php echo $linha[0]?>&tipo=1"><img src="../img/share.png" width="28"/></a></td>
                                </tr>
                                
							<?php
								$i++;
							}
                                $conecta->close();
						}
						?>
						</table>
                        <form action="enviar_arquivo.php" method="post">
                        <div style="border-top:1px solid #eee;">
                            <input class="btn btn-primary" style="margin:8px;" type='submit' value='+ Adicionar' class='buttom'/>
                        </div>
						</form>
                    </div>
                    </center>
                </div>
                </div>
                </div>

