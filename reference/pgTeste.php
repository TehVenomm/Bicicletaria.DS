<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php

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
						Dados do Cadastro:
					</legend>
					
					
					
					<p>
						Estado:<br>
						<select name="estado">
							<option value="-"></option>
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
				</fieldset>
			
			<form>
		</div>
		</center>
	</body>
</html>