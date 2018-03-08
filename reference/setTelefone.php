<?php
	
	try
	{
		if (isset($_POST["salvar"])){
			$id = 0;
			$IdTipoTelefone = $_POST["tipoTelefone"];
			$numero = $_POST["numero"];
			$ddd = $_POST["ddd"];
			
			include "conexao.php";
			$sql = "INSERT INTO telefone VALUES (?, ?, ?, ?, ?)";
			$contatos = $conex -> prepare($sql);
			if($contatos -> execute(array($id, $id_entidade, $IdTipoTelefone, $numero, $ddd))){
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