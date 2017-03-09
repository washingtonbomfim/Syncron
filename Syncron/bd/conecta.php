<?php
	 $servidor   =   "localhost";   //SERVIDOR
 	 $usuario    =   "root";        //USUARIO
	 $senha      =   "";            //SENHA 
	 $bd         =   "syncron";   //DATABASE

	 //CONECTANDO 
 	
	 $conecta    = new mysqli($servidor, $usuario, $senha, $bd);
	 
	 if($conecta -> connect_errno) 
 		 echo "Erro de conexao com o banco!";
	 else

?>
