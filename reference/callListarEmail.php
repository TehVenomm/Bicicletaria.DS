<?php
	include "conexao.php";

	$sql = "SELECT idEmail, endereco FROM email WHERE idEntidade_Email = ?";
	$contatos = $conex -> prepare($sql);
	$contatos -> execute(array($id_entidade));
	

	foreach($contatos as $bolacha)
	{
			$id_email = $bolacha['idEmail'];
			$endereco_email = $bolacha['endereco'];
			
			echo "<tr>";
			echo "<th>".$id_email."</th>";
			echo "<th>".$endereco_email."</th>";
			
			echo "<th>
					<a href='editarEmail.php?idEntidade=$id_entidade&nomeEntidade=$nome_entidade&idEmail=$id_email'>
						<img src='imagens/Editar01.png' width='20px'>
					</a>
				  </th>";
			echo "<th>
					<a href='apagarEmail.php?idEntidade=$id_entidade&nomeEntidade=$nome_entidade&idEmail=$id_email'>
						<img src='imagens/Lixo01.png' width='20px'>
					</a>
				  </th>";
			
			echo "</tr>";									
	}
	$contatos = NULL;
	?>