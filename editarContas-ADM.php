<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Bicicletaria</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Bicicletaria - Gabriel Braz</center></h2>
			<hr>
		</header>
		

		<div>
			<fieldset>
				<legend>
					<p>Insira o E-Mail da conta à ser modificada:</p>
				</legend>
				<form action="edicaoContas.php" method="GET">
					<table border="0" style ="margin : 0 auto">
						<tr>
							<th>
								<input type="text" name="email" required placeholder="E-Mail"/>
							</th>
						</tr>
						
						<tr>
							<th>
								<input type="submit" value="editar" name="editar">
							</th>
						</tr>
						
						
					</table>
				</form>
				
				<hr>
				
				<a href="menuAdm.php">
					<input class="botaoTop" type="button" value="Cancelar" name="Cancelar" align="center">
				</a>
				
			</fieldset>
			
			
		</div>

	</body>
</html>