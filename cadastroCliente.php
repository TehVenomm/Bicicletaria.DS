<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Bicicletaria</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
				if(isset($_POST["salvar"]))
				{	
					
					$id = "";
					$endereco_email = $_POST["email"];
					$senha_plain = $_POST["senha"];
					$tipoConta = 4;
					
					$senha_criptografada = md5($senha_plain);
					
					
					include "conexao.php";
					$sql = "INSERT INTO usuario VALUES(?, ?, ?, ?)";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($id, $endereco_email,$senha_criptografada, $tipoConta));
					$contatos = NULL;
					
					header("location:index.html");
					
				}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Bicicletaria - Gabriel Braz</center></h2>
			<hr>
		</header>
		
			<a href="index.html">
				<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
			</a>
			<div class="cadastro">
				<fieldset>
					<legend>
						Dados do Cadastro:<br>
					</legend>
					<form action="" method="POST">
						<p>
							Endereco de E-mail: <br>
							<input type="text" name="email" maxlength="200" autofocus required>
						</p>
						
						<hr>
						
						<p>
							Senha:<br>
							<input type="password" name="senha" required>
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