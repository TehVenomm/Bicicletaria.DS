<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			$id_entidade = $_GET['idEntidade'];
			$nome_entidade = $_GET['nomeEntidade'];
			if(isset($_POST['sim']))
			{
				include "conexao.php";
				$sql = "DELETE FROM email WHERE email.idEntidade_Email = $id_entidade;
						DELETE FROM telefone WHERE telefone.idEntidade_telefone = $id_entidade;
						DELETE FROM endereco WHERE endereco.idEntidade_endereco = $id_entidade;
						DELETE FROM entidade WHERE entidade.idEntidade = $id_entidade;";
				$contatos = $conex -> prepare($sql);
				$contatos -> execute();
				$contatos= NULL;
				header("Location: listar.php");
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
			<h2 align="center">Deseja apagar o contato "<?php echo $nome_entidade;?>"</h2>
				<span align="center">
					<form action="" method="POST">
						<input type="submit" name="sim" value="Sim">
						<a href="listar.php">
							<input type="button" value="Não" >
						</a>
					</form>
				</span>
		</div>
	</body>
</html>