<?php
include '../bd/conecta.php';
session_start();
@$cod_grupo = $_REQUEST['cod_grupo'];

$cod_amigo = $_REQUEST['cod'];

 if(is_array($cod_amigo)){
  	
  	$face = implode(',', $cod_amigo); # Essa função resgata os valores e os coloca entre vírulas. "1, 4, 6, 8"
  	$codigos = explode(',', $face);
 }
 else{
  	$face = $cod_amigo; # Um valor só.
 }
$ERRO =0;
foreach ($codigos as $x) {
	
	echo $x." ";
	 $sql = $conecta->query("insert into syncron.sync_grupo_usuarios(codigo_grupo,codigo_usuario,status) values (".$cod_grupo." ," .$x. ", 'A')");
	 echo "<script>alert('teste')</script>";
	 if($sql > 0){
        
    }
    else{
        $ERRO ++;
    }

}

if($ERRO > 0){
	header("Location: lista_amigos_grupo.php?return=-1");
}else{
	header("Location: lista_amigos_grupo.php?return=1");
}


?>

