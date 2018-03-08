<?php
	
	try
	{
		if (isset($_POST["salvar"])){
			$id = 0;
			$email = $_POST["email"];
			
			include "conexao.php";
			$sql = "INSERT INTO email VALUES (?, ?, ?)";
			$contatos = $conex -> prepare($sql);
			if($contatos -> execute(array($id, $id_entidade, $email))){
				$contatos = NULL;
			} else {
				echo "ERRO";
			}
		}
	}
	catch(PDOexception $e)
	{
		echo $e->getMessage();
	}
	
?>