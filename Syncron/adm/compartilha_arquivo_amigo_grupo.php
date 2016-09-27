<?php
include '../bd/conecta.php';
session_start();
@$amigos = $_REQUEST['checkboxAmigo'];
@$grupos = $_REQUEST['checkboxGrupo'];
@$idarq = $_REQUEST['idarq'];
@$verifica = $_REQUEST['verifica'];
@$cod = $_SESSION['codigo_usuario'];
@$uploaddir = $_SESSION['uploaddir'];
@$descricao = $_REQUEST['descricao'];


if($verifica == 1){
	if(is_array($amigos)){
  	
  		$face = implode(',', $amigos); # Essa função resgata os valores e os coloca entre vírulas. "1, 4, 6, 8"
  		$codigosA = explode(',', $face);
	}else{
  		$codigosA = $amigos; # Um valor só.
 	}

 	foreach ($codigosA as $x) {

	 $sql = $conecta->query("insert into syncron.sync_arquivos(nome_arquivo,codigo_usuario,
                                codigo_diretorio,tipo_arquivo,hash_nome_arquivo,status,compartilhado,codigo_amigo,data_envio)values
                                ('$descricao', " .$cod. " ,
                                (select codigo_diretorio from sync_diretorios where codigo_usuario = " .$cod. "),1,'0000000000','E','S'," .$x. ",(select date_format(now(),'%d-%m-%Y')))");
	 
   }
	 	if($sql > 0){

      header("Location: lista_arquivos.php?return=3");
        
    }

}elseif($verifica == 2){
	
  if(is_array($grupos)){
    
      $face = implode(',', $grupos); # Essa função resgata os valores e os coloca entre vírulas. "1, 4, 6, 8"
      $codigosG = explode(',', $face);
  }else{
      $codigosG = $grupos; # Um valor só.
  }

  //$sqlG = $conecta->query("select codigo_usuario from sync_grupo_usuarios where codigo_grupo = "  .$grupos);
  $y=0;
  foreach ($codigosG as $x) {
	  
    $sqlG = $conecta->query("select codigo_usuario from sync_grupo_usuarios where codigo_grupo = "  .$x);
    
    while($linha = $sqlG->fetch_row()){

      $sql2 = $conecta->query("insert into syncron.sync_arquivos(nome_arquivo,codigo_usuario,
                                codigo_diretorio,tipo_arquivo,hash_nome_arquivo,status,compartilhado,codigo_amigo,data_envio)values
                                ('$descricao', " .$cod. " ,
                                (select codigo_diretorio from sync_diretorios where codigo_usuario = " .$cod. "),1,'0000000000','E','S'," .$linha[0]. ",(select date_format(now(),'%d-%m-%Y')))");  

    }

   }
    if($sql2 > 0 && $sqlG > 0){

      header("Location: lista_arquivos.php?return=4");
        
    }
  
}

?>
