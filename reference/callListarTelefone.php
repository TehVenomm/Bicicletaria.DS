<?php
	include "conexao.php";

	$sql = "SELECT idTelefone, ddd, numero, listatipotelefone.nome as operadora 
				FROM telefone
				LEFT JOIN listatipotelefone ON listatipotelefone.idListaTipoTelefone = telefone.idListaTipoTelefone_Telefone
			WHERE idEntidade_Telefone = ?";
	$contatos = $conex -> prepare($sql);
	$contatos -> execute(array($id_entidade));
	

	foreach($contatos as $bolacha)
	{
			$id_telefone = $bolacha['idTelefone'];
			$ddd_telefone = $bolacha['ddd'];
			$numero_telefone = $bolacha['numero'];
			$operadora_telefone = $bolacha['operadora'];
			
			echo "<tr>";
			echo "<th>".$id_telefone."</th>";
			echo "<th>".$ddd_telefone."</th>";
			
			echo "<th>".$numero_telefone."</th>";
			
			echo "<th align='center'>".$operadora_telefone."</th>";
			
			echo "<th>
					<a href='editarTelefone.php?idEntidade=$id_entidade&nomeEntidade=$nome_entidade&idTelefone=$id_telefone'>
						<img src='imagens/Editar01.png' width='20px'>
					</a>
				  </th>";
			echo "<th>
					<a href='apagarTelefone.php?idEntidade=$id_entidade&nomeEntidade=$nome_entidade&idTelefone=$id_telefone'>
						<img src='imagens/Lixo01.png' width='20px'>
					</a>
				  </th>";
			
			echo "</tr>";									
	}
	$contatos = NULL;
	?>