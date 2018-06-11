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
					$sql = "SELECT * FROM usuario WHERE email = ?";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($endereco_email,));
					$qtd = $contatos -> rowCount();
					
					if ($qtd == 0){
						$sql = "INSERT INTO usuario VALUES(?, ?, ?, ?)";
						$contatos = $conex -> prepare($sql);
						$contatos -> execute(array($id, $endereco_email,$senha_criptografada, $tipoConta));
						$contatos = NULL;
						
						header("location:index.php");
					} else {
						echo "<script> alert('E-mail já cadastrado!'); </script>";
					}
					
					
				}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Cadastro Cliente - Projeto Bicicletaria</center></h2>
			<hr>
		</header>
		
			<a href="index.php">
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