<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "conexao.php";
			$id_entidade = $_GET['idEntidade'];
			$nome_entidade = $_GET['nomeEntidade'];
			$id_email_edicao = $_GET['idEmail'];
			
			$sql = "SELECT * FROM email WHERE idEmail = $id_email_edicao";
			$contatos = $conex -> prepare($sql);
			$contatos -> execute();


			foreach($contatos as $bolacha)
			{
				$email_edicao = $bolacha['endereco'];
			}
			
			if(isset($_POST["salvar"]))
				{
					$email = $_POST["email"];
					include "conexao.php";
					$sql = "UPDATE email SET 
							endereco = ?
							WHERE idEmail = ?";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($email, $id_email_edicao));
					$contatos = NULL;
					header("location:listarExpandir.php?idExpansao=$id_entidade&nomeExpansao=$nome_entidade");
				}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Agenda - Gabriel Braz</center></h2>
			<hr>
		</header>
		
		<center>
		<div>
			
			<form action="" method="POST">
				<fieldset>
					<legend>
						Dados para Edição:
					</legend>
					
					<hr>
					
					<p>
						E-mail:<br>
						<input type="text" value="<?php echo $email_edicao; ?>" name="email">
					</p>
					
					<hr>
					
					<p>
						<input type="submit" value="salvar" name="salvar">
					</p>
				</fieldset>
			
			<form>
		</div>
		</center>
	</body>
</html>