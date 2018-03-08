<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			
			$id_entidade = $_GET["idEntidade"];
			$nome_entidade = $_GET["nomeEntidade"];
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
				<input type="hidden" name="id_entidade"     value="<?php echo $id_entidade;?>">
				<input type="hidden" name="nome_entidade"    value="<?php echo $nome_entidade;?>">
				
				<fieldset>
					<legend>
						Dados do Cadastro:<br>
						Campos com * são obrigatórios!
					</legend>
					
					<p>
						Endereço de Email: *<br>
						<input type="email" name="email" maxlength="200" autofocus required>
					</p>
					
					<hr>
					
					<p>
						<input type="submit" value="salvar" name="salvar">
					</p>
					
					<?php
						include "setEmail.php";
						if (isset($_POST["salvar"]))
						header("location:listarExpandir.php?idExpansao=$id_entidade&nomeExpansao=$nome_entidade");
					?>
				</fieldset>
			
			<form>
		</div>
		</center>
	</body>
</html>