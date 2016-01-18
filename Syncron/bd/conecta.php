<?php
	 $servidor   =   "localhost";   //SERVIDOR
 	 $usuario    =   "root";        //USUARIO
	 $senha      =   "4f9bba0717";            //SENHA quando eu chegar na brasilcard, mudar
	 $bd         =   "syncron";   //DATABASE

	 //CONECTANDO 
 	
	 $conecta    = new mysqli($servidor, $usuario, $senha, $bd);
	 
	 if($conecta -> connect_errno) 
 		 echo "Erro de conexao com o banco!";
	 else
 		// echo "conectado";
?>
