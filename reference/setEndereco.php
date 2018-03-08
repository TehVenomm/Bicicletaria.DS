<?php
	
	try
	{
		if (isset($_POST["salvar"])){
			$id = 0;
			$rua = $_POST["rua"];
			$numero = $_POST["numero"];
			$complemento = $_POST["complemento"];
			$bairro = $_POST["bairro"];
			$id_cidade = $_POST["cidade"];
			
			include "conexao.php";
			$sql = "INSERT INTO endereco VALUES (?, ?, ?, ?, ?, ?, ?)";
			$contatos = $conex -> prepare($sql);
			if($contatos -> execute(array($id, $id_entidade, $id_cidade, $rua, $numero, $complemento, $bairro))){
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