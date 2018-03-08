<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "conexao.php";
			$id_entidade 		= $_GET['idEntidade'];
			$nome_entidade 		= $_GET['nomeEntidade'];
			$id_endereco_edicao = $_GET['idEndereco'];
			
			$sql = "SELECT * FROM endereco WHERE idEndereco = $id_endereco_edicao";
			$contatos = $conex -> prepare($sql);
			$contatos -> execute();


			foreach($contatos as $bolacha)
			{
				$rua_edicao 		= $bolacha['rua'];
				$numero_edicao 		= $bolacha['numero'];
				$complemento_edicao = $bolacha['complemento'];
				$bairro_edicao		= $bolacha['bairro'];
			}
			
			if(isset($_POST["salvar"]))
				{
					$rua 		 = $_POST["rua"];
					$numero 	 = $_POST["numero"];
					$complemento = $_POST["complemento"];
					$bairro 	 = $_POST["bairro"];
					
					
					include "conexao.php";
					$sql = "UPDATE endereco SET 
								rua = ?,
								numero = ?,
								complemento = ?,
								bairro = ?
							WHERE idEndereco = ?";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($rua, $numero, $complemento, $bairro, $id_endereco_edicao));
					$contatos = NULL;
					header("location:listarExpandir.php?idExpansao=$id_entidade&nomeExpansao=$nome_entidade");
				}
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
				<input type="hidden" name="id_entidade"     value="<?php echo $id_entidade;?>">
				<input type="hidden" name="nome_entidade"    value="<?php echo $nome_entidade;?>">
				
				<fieldset>
					<legend>
						Dados do Cadastro:<br>
						Campos com * são obrigatórios!
					</legend>
					
					<p>
						Nome da Rua: *<br>
						<input type="text" name="rua" value="<?php if(isset($_POST['enviarEstado'])){echo $_POST['rua']; }   ?>" maxlength="200" autofocus required>
					</p>
					
					<hr>
					
					<p>
						Numero: *<br>
						<input type="number_format" name="numero"  value="<?php if(isset($_POST['enviarEstado'])){echo $_POST['numero'];}?>" maxlength="11">
					</p>
					
					<hr>
					
					<p>
						Complemento:<br>
						<input type="text" name="complemento"  value="<?php if(isset($_POST['complemento'])){echo $_POST['numero'];}?>" maxlength="15">
					</p>
					
					<hr>
					
					<p>
						Bairro:<br>
						<input type="text" name="bairro"  value="<?php if(isset($_POST['enviarEstado'])){echo $_POST['bairro'];}?>"  maxlength="15">
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