<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
				if(isset($_POST["salvar"]))
				{	
					
					$id = "";
					$id_grupo = $_POST["idGrupo"];
					$primeiro_nome = $_POST["primeiroNome"];
					$sobre_nome = $_POST["sobreNome"];
					$ultimo_nome = $_POST["ultimoNome"];
					$apelido = $_POST["apelido"];
					$website = $_POST["website"];
					$data_nascimento = $_POST["data_nascimento"];
					$sexo = $_POST["sexo"];
					$obs = $_POST["obs"];
					
					if ($id_grupo == ""){
						$id_grupo = NULL;
					}
					
					
					include "conexao.php";
					$sql = "INSERT INTO entidade VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($id, $id_grupo,$primeiro_nome, $sobre_nome, $ultimo_nome, $sexo, $data_nascimento, $apelido, $website,  $obs));
					$contatos = NULL;
					
					header("location:cadastro2.php");
					
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
			<a href="index.html">
				<input class="botaoTop" type="button" value="Menu Principal" name="index" align="center">
			</a>
			
			<form action="" method="POST">
				<fieldset>
					<legend>
						Dados do Cadastro:<br>
						Campos com * são obrigatórios!
					</legend>
					
					<p>
						Primeiro Nome: *<br>
						<input type="text" name="primeiroNome" maxlength="50" autofocus required>
					</p>
					
					<hr>
					
					<p>
						Sobre Nome:<br>
						<input type="text" name="sobreNome" maxlength="50">
					</p>
					
					<hr>
					
					<p>
						Ultimo Nome:<br>
						<input type="text" name="ultimoNome" maxlength="50">
					</p>
					
					<hr>
					
					<p>
						Grupo:<br>
						<select name="idGrupo">
							<option value=""></option>
							<?php
								include "callGrupos.php";
							?>							
						</select>
						
					</p>
					
					<hr>
					
					<p>
						Apelido:<br>
						<input type="text" name="apelido" maxlength="50">
					</p>
					
					<hr>
					
					<p>
						Website:<br>
						<input type="text" name="website" maxlength="200">
					</p>
					
					<hr>
					
					<p>
						Data de Nascimento:<br>
						<input type="date" name="data_nascimento">
					</p>
					
					<hr>
					
					<p>
						Sexo:<br>
						<input type="radio" value="m" name="sexo" checked="checked" >M
						<input type="radio" value="f" name="sexo">F
					</p>
										
					<hr>
					
					<p>
						Obs:<br>
						<input type="text" name="obs" maxlength="200">
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