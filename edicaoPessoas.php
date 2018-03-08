<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Bicicletaria</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "conexao.php";
			$id_edicao = $_GET['idPessoa'];
			
			$sql = "SELECT * FROM pessoa 
					LEFT JOIN usuario ON usuario.idUsuario = pessoa.idUsuario_Pessoa
					WHERE idPessoa = '$id_edicao'";
			$contatos = $conex -> prepare($sql);
			$contatos -> execute();
			

			foreach($contatos as $bolacha)
			{
				$id_edicao = $bolacha['idPessoa'];
				$nome_edicao = $bolacha['nome'];
				$telefone_edicao = $bolacha['telefone'];
				$email_edicao = $bolacha['email'];
			}
			$contatos = NULL;
			
			if (is_null($id_edicao)){
				header("location: notFound.php");
			}
			
			if(isset($_POST["enviar"]))
				{
					
					$nome = $_POST['nome_new'];
					$telefone = $_POST['telefone_new'];
					$email = $_POST['email_new'];
					
					
					include "conexao.php";
					$sql = "SET @id = (SELECT idUsuario 
									   FROM usuario 
									   WHERE email = '$email');
							UPDATE pessoa 
							SET nome = '$nome', 
								telefone = '$telefone', 
								idUsuario_Pessoa = @id
							WHERE idPessoa = '$id_edicao';";
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
		
		<div>
			<fieldset>
				<legend>
					Dados para Edição de <?php echo $nome_edicao;?>:
				</legend>
				
				<hr>
				
				<form action="" method="POST">
					<p>
						E-Mail da Conta: <br>
						<input type="text" name="email_new" value="<?php echo $email_edicao; ?>" maxlength="200" autofocus required>
					</p>
					
					<hr>
					
					<p>
						Nome:<br>
						<input type="text" name="nome_new" value="<?php echo $nome_edicao; ?>" maxlength="200" required>
					</p>
					
					<p>
						Telefone:<br>
						<input type="text" name="telefone_new" value="<?php echo $telefone_edicao; ?>" maxlength="15" required>
					</p>
					
					<hr>
					
					<p>
						<input type="submit" value="enviar" name="enviar">
					</p>
				<form>
			</fieldset>
			
		</div>
	</body>
</html>