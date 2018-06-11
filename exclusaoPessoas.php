<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Bicicletaria</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			$id_pessoa_exclusao = $_GET['idPessoa'];
			if(isset($_POST['sim']))
			{
				include "conexao.php";
				$sql = "DELETE FROM pessoa WHERE idPessoa = '$id_pessoa_exclusao'";
				$contatos = $conex -> prepare($sql);
				$contatos -> execute();
				$contatos= NULL;
				header("Location: listarPessoas-ADM.php");
			}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Exclusão Pessoa - Projeto Bicicletaria</center></h2>
			<hr>
		</header>
		
			<h2 align="center">
				Deseja apagar esta pessoa?
			</h2>
			<div>
				<span align="center">
					<form action="" method="POST">
						<input type="submit" name="sim" value="Sim">
						<?php
							echo "<th>
									<a href='listarPessoas-ADM.php'>
										<input type='button' name='nao' value='Não'>
									</a>
								  </th>";
						?>
					</form>
				</span>
		</div>
	</body>
</html>