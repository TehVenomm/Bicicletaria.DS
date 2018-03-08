<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "conexao.php";
			$id_entidade = $_GET['idEntidade'];
			$nome_entidade = $_GET['nomeEntidade'];
			$id_telefone_edicao = $_GET['idTelefone'];
			$sql = "SELECT * FROM telefone WHERE idTelefone = $id_telefone_edicao";
			$contatos = $conex -> prepare($sql);
			$contatos -> execute();


			foreach($contatos as $bolacha)
			{
				$id_tipo_edicao = $bolacha['idListaTipoTelefone_Telefone'];
				$numero_edicao = $bolacha['numero'];
				$ddd_edicao = $bolacha['ddd'];
				
			}
			
			if(isset($_POST["salvar"]))
				{
					$numero = $_POST["numero"];
					$ddd = $_POST["ddd"];
					$idTipo = $_POST["tipoTelefone"];
					
					if ($idTipo == ""){
						$idTipo = NULL;
					}
					
					
					include "conexao.php";
					$sql = "UPDATE telefone SET 
							idListaTipoTelefone_Telefone = ?,
							numero = ?,
							ddd = ?
							WHERE idTelefone = ?";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($idTipo, $numero ,$ddd, $id_telefone_edicao));
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
				<fieldset>
					<legend>
						Dados para Edição:
					</legend>
					
					<p>
						Número:<br>
						<input type="number" value="<?php echo $numero_edicao; ?>" name="numero" autofocus>
					</p>
					
					<hr>
					
					<p>
						DDD:<br>
						<input type="number" value="<?php echo $ddd_edicao; ?>" name="ddd">
					</p>
					
					<hr>
					<p>
						Tipo:<br>
						<select  name="tipoTelefone">
							<option value="0"></option>
							<?php
								include "callTipoTelefone.php";
							?>							
						</select>
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