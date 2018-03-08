<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
		
			$id_entidade_exclusao = $_GET['idEntidade'];
			$nome_entidade_exclusao = $_GET['nomeEntidade'];
			$id_endereco_exclusao = $_GET['idEndereco'];
			if(isset($_POST['sim']))
			{
				include "conexao.php";
				$sql = "DELETE FROM endereco WHERE idEndereco = $id_endereco_exclusao";
				$contatos = $conex -> prepare($sql);
				$contatos -> execute();
				$contatos= NULL;
				header("Location: listarExpandir.php?idExpansao=$id_entidade_exclusao&nomeExpansao=$nome_entidade_exclusao");
			}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Agenda - Apagar - Gabriel Braz</center></h2>
			<hr>
		</header>
		<div>
			<h2 align="center">Deseja apagar o endereco escolhido?</h2>
				<span align="center">
					<form action="" method="POST">
						<input type="submit" name="sim" value="Sim">
						<?php
							echo "<th>
									<a href='listarExpandir.php?idExpansao=$id_entidade_exclusao&nomeExpansao=$nome_entidade_exclusao'>
										<input type='button' name='nao' value='Não'>
									</a>
								  </th>";
						?>
					</form>
				</span>
		</div>
	</body>
</html>