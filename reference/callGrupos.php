<?php
	include "conexao.php";
	$sql = "SELECT * FROM listaGrupo ORDER BY nome";
	$contatos = $conex -> prepare($sql);
	$contatos -> execute();
	
	foreach($contatos as $bolacha)
	{
			$idListaGrupo = $bolacha['idListaGrupo'];
			$nomeGrupo = $bolacha['nome'];
			if ($id_grupo_edicao == $idListaGrupo){
				echo "<option selected value='$idListaGrupo'>$nomeGrupo</option>";
			} else {
				echo "<option value='$idListaGrupo'>$nomeGrupo</option>";
			}
	}
	$contatos = NULL;
	
?>