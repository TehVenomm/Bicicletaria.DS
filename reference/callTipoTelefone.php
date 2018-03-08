<?php
	include "conexao.php";
	$sql = "SELECT * FROM listatipotelefone ORDER BY nome";
	$contatos = $conex -> prepare($sql);
	$contatos -> execute();
	
	foreach($contatos as $bolacha)
	{
			$idTipoTelefone = $bolacha['idListaTipoTelefone'];
			$nomeTipoTelefone = $bolacha['nome'];
			if ($id_tipo_edicao == $idTipoTelefone){
				echo "<option selected='selected' value='$idTipoTelefone'>$nomeTipoTelefone</option>";
			} 
			else {
				echo "<option value='$idTipoTelefone'>$nomeTipoTelefone</option>";
			}
	}
	$contatos = NULL;
?>