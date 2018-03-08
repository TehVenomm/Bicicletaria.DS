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
						Nome da Rua: *<br>
						<input type="text" name="rua" value="<?php if(isset($_POST['enviarEstado'])){echo $_POST['rua']; }   ?>" maxlength="200" autofocus required>
					</p>
					
					<hr>
					
					<p>
						Numero: *<br>
						<input type="number_format" name="numero"  value="<?php if(isset($_POST['enviarEstado'])){echo $_POST['numero'];}?>" maxlength="11">
					</p>
					
					<hr>
					
					<p>
						Complemento:<br>
						<input type="text" name="complemento"  value="<?php if(isset($_POST['complemento'])){echo $_POST['numero'];}?>" maxlength="15">
					</p>
					
					<hr>
					
					<p>
						Bairro:<br>
						<input type="text" name="bairro"  value="<?php if(isset($_POST['enviarEstado'])){echo $_POST['bairro'];}?>"  maxlength="15">
					</p>
					
					<hr>
					
					<p>
						Estado:<br>
						<select name="estado">
							<option value="0"></option>
							<?php

								include "callEstados.php";
							?>							
						</select>
						
					</p>
					
					<hr>
					
					<p>
						<?php
							include "callCidades.php";
						?>
					</p>
					
					<hr>
					
					<p>
						<input type="submit" value="salvar" name="salvar">
					</p>
					
					<?php
						include "setEndereco.php";
						if (isset($_POST["salvar"]))
						header("location:cadastro2.php");
					?>
				</fieldset>
			
			<form>
		</div>
		</center>
	</body>
</html>