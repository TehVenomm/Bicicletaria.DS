<?php
	include "conexao.php";

	$sql = "SELECT listagrupo.nome as nomeGrupo, primeiroNome, sobreNome, ultimoNome, sexo, dataNascimento, apelido, website, Obs FROM entidade 
		LEFT JOIN listagrupo ON listagrupo.idListaGrupo = entidade.IdListaGrupo_Entidade
		WHERE idEntidade = ?";
	$contatos = $conex -> prepare($sql);
	$contatos -> execute(array($id_entidade));
	

	foreach($contatos as $bolacha)
	{
			$primeiroNome = $bolacha['primeiroNome'];
			$sobreNome = $bolacha['sobreNome'];
			$ultimoNome = $bolacha['ultimoNome'];
			$sexo = $bolacha['sexo'];
			$dataNascimento = $bolacha['dataNascimento'];
			$apelido = $bolacha['apelido'];
			$website = $bolacha['website'];
			$Obs = $bolacha['Obs'];
			$grupo = $bolacha['nomeGrupo'];
										
			
			if($dataNascimento == "0000-00-00")
			{
				$dataNascimento = "-";
			} else
			{
				$data_nascimento =  date("d/m/Y",strtotime($bolacha['dataNascimento']));
			}
			
			
			echo "<tr>";
			echo "<th>".$primeiroNome."</th>";
			echo "<th>".$sobreNome." ".$ultimoNome."</th>";
			
			echo "<th>".$grupo."</th>";
			
			echo "<th align='center'>".$sexo."</th>";
			
			echo "<th align='center'>".$dataNascimento."</th>";
			
			echo "<th>".$apelido."</th>";
			
			echo "<th>".$website."</th>";
			echo "<th>".$Obs."</th>";	
			echo "<th>
					<a href='editarEntidade.php?idEntidade=$id_entidade&nomeEntidade=$nome_entidade'>
						<img src='imagens/Editar01.png' width='20px'>
					</a>
				  </th>";
			echo "<th>
					<a href='excluirEntidade.php?idEntidade=$id_entidade&nomeEntidade=$nome_entidade'>
						<img src='imagens/Lixo01.png' width='20px'>
					</a>
				  </th>";
			echo "</tr>";									
	}
	$contatos = NULL;
?>