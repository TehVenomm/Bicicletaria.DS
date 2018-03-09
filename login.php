<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Bicicletaria</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "conexao.php";
			$email_login = $_POST['email'];
			$senha_login = $_POST['senha'];
			$sql = "SELECT * FROM usuario WHERE email = '$email_login'";
			$contatos = $conex -> prepare($sql);
			$contatos -> execute();

			$qtd = $contatos -> rowCount();
			
			foreach($contatos as $bolacha)
			{
				$email_compare 	= $bolacha['email'];
				$senha_compare 	= $bolacha['senha'];
				$nroPerfil 		= $bolacha['idListaPerfil_Usuario'];
			}
			
			if($qtd == 1){
				if(md5($senha_login) == $senha_compare){
					session_start();
					$_SESSION['email']	= $email_compare;
					$_SESSION['perfil'] = $nroPerfil;
					
					if ($nroPerfil == 1){
						header("Location: menuAdm.php");
					}
					
					if ($nroPerfil == 2){
						header("Location: menuVendedor.php");
					}
					
					if ($nroPerfil == 3){
						header("Location: menuTecnico.php");
					}
					
					if ($nroPerfil == 4){
						header("Location: menuCliente.php");
					}
					
				} else {
					$mensagem = "E-mail ou senha incorretos!";
				}
			} else {
				$mensagem = "E-mail ou senha incorretos!";
			}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Bicicletaria - Gabriel Braz</center></h2>
			<hr>
		</header>
		
		<center>
		<div>
				<fieldset>
					
					<p>
						<?php echo $mensagem; ?>
					</p>
					
					<hr>
					
					<p>
						<a href="index.php">
							<input type="button" value="Retornar" name="retorno">
						</a>
					</p>
				</fieldset>
			
			<form>
		</div>
		</center>
	</body>
</html>