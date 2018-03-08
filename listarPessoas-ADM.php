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
			<h2><center>Projeto Bicicletaria - <?php echo "Painel ADM"; ?> - Gabriel Braz</center></h2>
			<hr>
		</header>
		<nav>
			<a href="cadastroContas-ADM.php">
				<input type="button" value="Cadastrar Contas"/>
			</a>
			
			<a href="cadastrarPessoa-ADM.php">
				<input type="button" value="Cadastrar Pessoas"/>
			</a>
			
			<a href="listarContasClt-ADM.php">
				<input type="button" value="Listar Contas Cliente"/>
			</a>
			
			<a href="editarContas-ADM.php">
				<input type="button" value="Editar Contas"/>
			</a>
			
			<a href="listarContasTec-ADM.php">
				<input type="button" value="Listar Contas Técnico"/>
			</a>
			
			<a href="listarContasVndr-ADM.php">
				<input type="button" value="Listar Contas Vendedor"/>
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