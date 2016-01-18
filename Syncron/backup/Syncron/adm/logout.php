<?php
	
	session_start(); 
	
	session_destroy();
	header("Location: ../index.php?retorno=2");

?>
