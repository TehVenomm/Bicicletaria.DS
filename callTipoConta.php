<?php
	include "conexao.php";
	$sql = "SELECT * FROM listaperfil ORDER BY nome";
	$contatos = $conex -> prepare($sql);
	$contatos -> execute();
	
	foreach($contatos as $bolacha)
	{
			$idListaPerfil = $bolacha['idListaPerfil'];
			$nomePerfil = $bolacha['nome'];
			if ($id_perfil_edicao == $idListaPerfil){
				echo "<option selected value='$idListaPerfil'>$nomePerfil</option>";
			} else {
				echo "<option value='$idListaPerfil'>$nomePerfil</option>";
			}
	}
	$contatos = NULL;
	
?>