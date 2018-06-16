<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Bicicletaria</title>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Geração do relatório B</center></h2>
			<hr>
			<?php
				$contador = 1;

			?>
		</header>
		<nav>
			<a href="index.php">
				<input class="botaoTop" type="button" value="Retornar" name="index" align="center">
			</a>
			<a href="relatorio2GerarPdf.php">
				<input class="botaoTop" type="button" value="Gerar PDF" name="pdfGen" align="center">
			</a>
			
		</nav>
			<div>
				<fieldset>
					<legend>
						Tabela Funcionários
					</legend>
					
					<table border="1" style ="margin : 0 auto">
						<th>#</th>
						<th>E-Mail</th>
						<th>Nome</th>
						<th>Telefone</th>
						
						<?php
							include "conexao.php";
							$sql = "SELECT u.email AS email, P.nome AS nome, P.telefone AS telefone
									FROM usuario AS U
									LEFT JOIN pessoa AS P ON u.idUsuario = P.idUsuario_Pessoa
									WHERE U.idListaPerfil_Usuario != 4";
							$contatos = $conex -> prepare($sql);
							$contatos -> execute();

							$htmlstring = "<table border='1' style ='margin : 0 auto'>
												<th>#</th>
												<th>E-Mail</th>
												<th>Nome</th>
												<th>Telefone</th>";
							foreach($contatos as $bolacha)
							{
									$email = $bolacha['email'];
									$nome = $bolacha['nome'];								
									$telefone = $bolacha['telefone'];								
									
									if (is_null($nome)){
										$nome = " - ";
									}
									
									if (is_null($telefone)){
										$telefone = " - ";
									}
									
									
									echo "<tr>";
									echo "<td>".$contador."</td>";
									
									echo "<td>".$email."</td>";
									
									echo "<td>".$nome."</td>";
									
									echo "<td>".$telefone."</td>";
									
									echo "</tr>";
									$contador++;
									$htmlstring = $htmlstring."<tr>"."<td>".$contador."</td>"."<td>".$email."</td>"."<td>".$nome."</td>"."<td>".$telefone."</td>"."</tr>";
							}
							$contatos= NULL;
							$htmlstring = $htmlstring."</table>";
							
							
						?>
						
					
					</table>
				</fieldset>
				<form action="relatorioBGerarXls.php" method="POST">
					<input type="hidden" value="<?=$htmlstring?>" name="stringhtml" />
					<input type="submit" value="Gerar XLS" name="xlsGen" align="center" />
				</form>
			</div>
	</body>
</html>