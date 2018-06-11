<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Bicicletaria</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			$nroTipoPg = 1;
			include "validaSessao.php";
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Bicicletaria - Painel ADM - Gabriel Braz</center></h2>
			<hr>
		</header>
		<nav>
			<a href="cadastroContas-ADM.php">
				<input type="button" value="Cadastrar Contas"/>
			</a>
			
			<a href="cadastrarPessoa-ADM.php">
				<input type="button" value="Cadastrar Pessoas"/>
			</a>
			
			<a href="editarContas-ADM.php">
				<input type="button" value="Editar Contas"/>
			</a>
			
			<a href="listarPessoas-ADM.php">
				<input type="button" value="Listar Pessoas"/>
			</a>
			
			<a href="listarContasClt-ADM.php">
				<input type="button" value="Listar Contas Cliente"/>
			</a>
			
			<a href="listarContasTec-ADM.php">
				<input type="button" value="Listar Contas Técnico"/>
			</a>
			
			<a href="listarContasVndr-ADM.php">
				<input type="button" value="Listar Contas Vendedor"/>
			</a>
		</nav>
		<div id="divCorpoIndex">
			<fieldset>
				<legend>
					<p>Painel</p>
				</legend>
				
				<table border="0" style ="margin : 0 auto">
					<tr>
						<th>
							Menu administrativo, escolha uma opção acima.
						</th>
					</tr>
				</table>
				
				
				<hr>
				
				<a href="logOut.php">
					<input class="botaoTop" type="button" value="Logout" name="logout" align="center">
				</a>
				
			</fieldset>
			
			
		</div>

	</body>
</html>