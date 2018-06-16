<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Bicicletaria</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "redirecionaSessao.php";
		?>
	</head>
	<body>
		
		<header>
			<hr>
			<h2><center>Projeto Bicicletaria - LOGIN - Gabriel Braz</center></h2>
			<hr>
		</header>
		

		<div>
			<fieldset>
				<legend>
					<p>Realize seu login:</p>
				</legend>
				<form action="login.php" method="POST">
					<table border="0" style ="margin : 0 auto">
						<tr>
							<th>
								<input type="text" name="email" required placeholder="E-Mail"/>
							</th>
						</tr>
						
						<tr>
							<th>
								<input type="password" name="senha" required placeholder="Senha"/>
							</th>
						</tr>
						
						<tr>
							<th>
								<input type="submit" value="Login" name="login">
							</th>
						</tr>
						
						
					</table>
				</form>
				
				<hr>
				
				<a href="cadastroCliente.php">
					<input class="botaoTop" type="button" value="Cadastrar-se" name="cadastroCliente" align="center">
				</a>
				
			</fieldset>
			
			
		</div>
		<div>
			<fieldset>
				<legend>
					Gerar Relatórios:
				</legend>
				<a href="relatorio1.php">
					<input class="botaoTop" type="button" value="Relatório A" name="irRelatorioUm" align="center">
				</a>
				<a href="relatorio2.php">
					<input class="botaoTop" type="button" value="Relatório B" name="irRelatorioDois" align="center">
				</a>
			</fieldset>
		</div>
	</body>
</html>