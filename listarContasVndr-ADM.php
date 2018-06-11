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
			<h2><center>Visualizar Contas de Vendedor - Projeto Bicicletaria</center></h2>
			<hr>
		</header>
		<nav>
			<a href="menuADM.php">
				<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
			</a>
		</nav>

		<div>
			<fieldset>
				<legend>
					Dados do Cadastro:
				</legend>
				
				<table border="1" style ="margin : 0 auto">
					<th>ID</th>
					<th>E-Mail</th>
					<th>Tipo</th>
					<th colspan="2">Opções</th>
					
					<?php
						include "conexao.php";
						$sql = "SELECT idUsuario, email, listaperfil.nome FROM usuario
								LEFT JOIN listaperfil ON listaperfil.idListaPerfil = usuario.idListaPerfil_usuario 
								WHERE idListaPerfil_usuario = 2
								GROUP BY usuario.idUsuario";
						$contatos = $conex -> prepare($sql);
						$contatos -> execute();
						foreach($contatos as $bolacha)
						{
								$id = $bolacha['idUsuario'];
								$email = $bolacha['email'];
								$tipo = $bolacha['nome'];								
								
								echo "<tr>";
								echo "<th>".$id."</th>";
								
								echo "<th>".$email."</th>";
								
								echo "<th align='center'>".$tipo."</th>";
								
								echo "<th>
										<a href='edicaoContas.php?email=$email&editar=editar'>
											<img src='imagens/Expandir01.png' width='20px'>
										</a>
									  </th>";
								echo "<th>
										<a href='exclusaoContas.php?email=$email&editar=editar'>
											<img src='imagens/Lixo01.png' width='20px'>
										</a>
									  </th>";
								
								echo "</tr>";
						}
						$contatos= NULL;
					?>
				
				</table>
			</fieldset>	
		</div>
	</body>
</html>