<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Bicicletaria</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
				if(isset($_POST["salvar"]))
				{
					$endereco_email = $_POST["email"];
					$nome = $_POST["nome"];
					$telefone = $_POST["telefone"];
					
					
					include "conexao.php";
					$sql = "SET @id = (SELECT idUsuario
										FROM usuario 
										WHERE email = '$endereco_email');
							INSERT INTO pessoa(nome, 
											   telefone, 
											   idUsuario_Pessoa) 
							VALUES('$nome', 
									'$telefone', 
									@id);";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute();
					$contatos = NULL;
					
					header("location:menuAdm.php");
					
				}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Bicicletaria - Gabriel Braz</center></h2>
			<hr>
		</header>
		
			<a href="menuADM.php">
				<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
			</a>
			<div class="cadastro">
				<fieldset>
					<legend>
						Dados do Cadastro:<br>
					</legend>
					<form action="" method="POST">
						<p>
							Endereco de E-mail da Conta: <br>
							<input type="text" name="email" maxlength="200" autofocus required>
						</p>
						
						<hr>
						
						<p>
							Nome:<br>
							<input type="text" name="nome" maxlength="200" required>
						</p>
						
						<p>
							Telefone:<br>
							<input type="text" name="telefone" maxlength="15" required>
						</p>
						
						<hr>
						
						<p>
							<input type="submit" value="salvar" name="salvar">
						</p>
					<form>
				</fieldset>
			</div>
		
	</body>
</html>