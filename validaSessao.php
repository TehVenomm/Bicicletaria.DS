<?php
	session_start();
	if(isset($_SESSION['email'])){
		if($_SESSION['perfil'] != $nroTipoPg){
			header("Location: acessoNaoAutorizado.php");
		}
	} else {
		header("Location: acessoNaoAutorizado.php");
	}

?>