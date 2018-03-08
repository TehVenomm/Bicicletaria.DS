<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			include "conexao.php";
			$id_entidade 	= $_GET['idEntidade'];
			$nome_entidade 	= $_GET['nomeEntidade'];
			
			$sql 		= "SELECT * FROM entidade WHERE idEntidade = $id_entidade";
			$contatos 	= $conex -> prepare($sql);
			$contatos 	-> execute();


			foreach($contatos as $bolacha)
			{
				$primeiroNome_edicao 		  = $bolacha['primeiroNome'];
				$sobreNome_edicao 			  = $bolacha['sobreNome'];
				$ultimoNome_edicao 			  = $bolacha['ultimoNome'];
				$sexo_edicao				  = $bolacha['sexo'];
				$dataNascimento_edicao		  = $bolacha['dataNascimento'];
				$apelido_edicao				  = $bolacha['apelido'];
				$website_edicao				  = $bolacha['website'];
				$obs_edicao					  = $bolacha['Obs'];
				$id_grupo_edicao = $bolacha['IdListaGrupo_Entidade'];
				
			}
			
			if(isset($_POST["salvar"]))
				{
					$primeiroNome 			= $_POST["primeiro_nome"];
					$sobreNome 				= $_POST["sobre_nome"];
					$ultimoNome 			= $_POST["ultimo_nome"];
					$sexo 					= $_POST["sexo"];
					$dataNascimento 		= $_POST["data_nascimento"];
					$apelido 				= $_POST["apelido"];
					$website 				= $_POST["website"];
					$obs 					= $_POST["obs"];
					$idListaGrupo_Entidade 	= $_POST["id_grupo"];
					
					if ($idListaGrupo_Entidade == "0"){
						$idListaGrupo_Entidade = NULL;
					}
					
					
					include "conexao.php";
					$sql = "UPDATE `entidade` SET 
					`idEntidade`=?,
					`IdListaGrupo_Entidade`=?,
					`primeiroNome`=?,
					`sobreNome`=?,
					`ultimoNome`=?,
					`sexo`=?,
					`dataNascimento`=?,
					`apelido`=?,
					`website`=?,
					`Obs`=? 
					WHERE idEntidade = ?";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($id_entidade, $idListaGrupo_Entidade, $primeiroNome, $sobreNome, $ultimoNome, $sexo, $dataNascimento, $apelido, $website, $Obs, $id_entidade));
					$contatos = NULL;
					header("Location: listarExpandir.php?idExpansao=$id_entidade&nomeExpansao=$primeiroNome&id=$idListaGrupo_Entidade");
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
						Primeiro Nome: <br>
						<input type="text" value="<?php echo $primeiroNome_edicao; ?>" name="primeiro_nome" autofocus>
					</p>
					
					<hr>
					
					<p>
						Sobre Nome:<br>
						<input type="text" value="<?php echo $sobreNome_edicao; ?>" name="sobre_nome">
					</p>
					
					<hr>
					
					<p>
						Ultimo Nome:<br>
						<input type="text" value="<?php echo $ultimoNome_edicao; ?>"  name="ultimo_nome">
					</p>
					
					<hr>
					
					<p>
						Sexo:<br>
						<input type="radio" value="m" <?php if ($sexo_edicao == "m") echo "checked";?> name="sexo">M
						<input type="radio" value="f" <?php if ($sexo_edicao == "f") echo "checked";?> name="sexo">F
					</p>
					
					<hr>
					
					<p>
						Data de Nascimento:<br>
						<input type="date" value="<?php echo $dataNascimento_edicao; ?>" name="data_nascimento">
					</p>
					
					<hr>
					
					<p>
						Apelido:<br>
						<input type="text" value="<?php echo $apelido_edicao; ?>" name="apelido">
					</p>
					
					<hr>
					
					<p>
						Website:<br>
						<input type="text" value="<?php echo $website_edicao; ?>" name="website">
					</p>
					
					<hr>
					
					<p>
						Obs:<br>
						<input type="text" value="<?php echo $obs_edicao; ?>" name="obs">
					</p>
					
					<hr>
					
					<p>
						Grupo:<br>
						<select name="id_grupo">
							<option value="0"></option>
							<?php
								include "callGrupos.php";
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