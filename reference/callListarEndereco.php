<?php
	include "conexao.php";

	$sql = "SELECT idEndereco, cidade.nome as Cidade , rua, numero, complemento, bairro
			FROM endereco
			LEFT JOIN cidade ON cidade.idCidade = endereco.idCidade_Endereco
			WHERE idEntidade_Endereco = ?";
	$contatos = $conex -> prepare($sql);
	$contatos -> execute(array($id_entidade));
	

	foreach($contatos as $bolacha)
	{
			$id_endereco = $bolacha['idEndereco'];
			$cidade_endereco = $bolacha['Cidade'];
			$rua_endereco = $bolacha['rua'];
			$numero_endereco = $bolacha['numero'];
			$complemento_endereco = $bolacha['complemento'];
			$bairro_endereco = $bolacha['bairro'];
			
			echo "<tr>";
			echo "<th>".$id_endereco."</th>";
			echo "<th>".$cidade_endereco."</th>";
			echo "<th>".$rua_endereco."</th>";
			echo "<th>".$numero_endereco."</th>";
			echo "<th>".$complemento_endereco."</th>";
			echo "<th>".$bairro_endereco."</th>";
			
			echo "<th>
					<a href='editarEndereco.php?idEntidade=$id_entidade&nomeEntidade=$nome_entidade&idEndereco=$id_endereco'>
						<img src='imagens/Editar01.png' width='20px'>
					</a>
				  </th>";
			echo "<th>
					<a href='apagarEndereco.php?idEntidade=$id_entidade&nomeEntidade=$nome_entidade&idEndereco=$id_endereco'>
						<img src='imagens/Lixo01.png' width='20px'>
					</a>
				  </th>";
			
			echo "</tr>";									
	}
	$contatos = NULL;
	?>