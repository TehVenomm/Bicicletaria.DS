<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			
			@$id_entidade = $_POST["id_entidade"];
			@$nome_entidade = $_POST["nome_entidade"];
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
						Número: *<br>
						<input type="number_format" name="numero" maxlength="10" autofocus required>
					</p>
					
					<hr>
					
					<p>
						DDD: *<br>
						<input type="number_format" name="ddd" maxlength="3">
					</p>
					
					<hr>
					
					
					<p>
						Tipo:<br>
						<select name="tipoTelefone">
							<option value="0"></option>
							<?php
								include "callTipoTelefone.php";
							?>							
						</select>
						
					</p>				
					
					<hr>
					
					<p>
						<input type="submit" value="salvar" name="salvar">
					</p>
					
					<?php
						include "setTelefone.php";
						if (isset($_POST["salvar"]))
						header("location:cadastro2.php");
					?>
				</fieldset>
			
			<form>
		</div>
		</center>
	</body>
</html>