<?php
	include "conexao.php";
	$sql = "SELECT * FROM estado ORDER BY nome";
	$contatos = $conex -> prepare($sql);
	$contatos -> execute();
	
	foreach($contatos as $bolacha)
	{
			$idEstado = $bolacha['idEstado'];
			$nomeEstado = $bolacha['nome'];
			echo "<option value='$idEstado'>$nomeEstado</option>";
	}
	$contatos = NULL;
?>