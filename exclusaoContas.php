<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Bicicletaria</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			$email_exclusao = $_GET['email'];
			if(isset($_POST['sim']))
			{
				include "conexao.php";
				$sql = "DELETE FROM usuario WHERE email = '$email_exclusao'";
				$contatos = $conex -> prepare($sql);
				$contatos -> execute();
				$contatos= NULL;
				header("Location: menuAdm.php");
			}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Exclusão Contas - Projeto Bicicletaria</center></h2>
			<hr>
		</header>
		
			<h2 align="center">
			Deseja apagar a conta associada ao email: <br>"<?php echo $email_exclusao; ?>"?
			</h2>
			<div>
				<span align="center">
					<form action="" method="POST">
						<input type="submit" name="sim" value="Sim">
						<?php
							echo "<th>
									<a href='menuAdm.php'>
										<input type='button' name='nao' value='Não'>
									</a>
								  </th>";
						?>
					</form>
				</span>
		</div>
	</body>
</html>