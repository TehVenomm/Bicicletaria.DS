<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Bicicletaria</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Visualizar Pessoas Cadastradas - Projeto Bicicletaria</center></h2>
			<hr>
		</header>
		<nav>
			<a href="menuADM.php">
				<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
			</a>
		</nav>
		
		<fieldset>
			<legend>
				Dados do Cadastro:
			</legend>
			
			<table border="1" style ="margin : 0 auto">
				<th>ID</th>
				<th>Nome</th>
				<th>Telefone</th>
				<th>E-Mail</th>
				<th colspan="2">Opções</th>
				
				<?php
					include "conexao.php";
					$sql = "SELECT idPessoa, nome, telefone, usuario.email 
							FROM pessoa
							LEFT JOIN usuario ON usuario.idUsuario = pessoa.idUsuario_Pessoa 
							GROUP BY pessoa.idPessoa";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute();
					foreach($contatos as $bolacha)
					{
							$id = $bolacha['idPessoa'];
							$nome = $bolacha['nome'];
							$telefone = $bolacha['telefone'];
							$email = $bolacha['email'];								
							
							echo "<tr>";
							echo "<th>".$id."</th>";
							
							echo "<th>".$nome."</th>";
							
							echo "<th>".$telefone."</th>";
							
							echo "<th>".$email."</th>";
							
							echo "<th>
									<a href='edicaoPessoas.php?idPessoa=$id&editar=editar'>
										<img src='imagens/Expandir01.png' width='20px'>
									</a>
								  </th>";
							echo "<th>
									<a href='exclusaoPessoas.php?idPessoa=$id&editar=editar'>
										<img src='imagens/Lixo01.png' width='20px'>
									</a>
								  </th>";
							
							echo "</tr>";
					}
					$contatos= NULL;
				?>
			
			</table>
		</fieldset>
	</body>
</html>