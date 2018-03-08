<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			
			if(empty($id)){
				include "conexao.php";
				$sql = "SELECT * FROM entidade ORDER BY idEntidade DESC LIMIT 1";
				$contatos = $conex -> prepare($sql);
				$contatos -> execute();
				foreach($contatos as $bolacha){
					$id_entidade = $bolacha["idEntidade"];
					$nome_entidade = $bolacha["primeiroNome"];
				}
				$contatos = NULL;
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
			<fieldset>
				<legend>
					Cadastro Opcional <br> para '<?php echo $nome_entidade; ?>':<br>
				</legend>
				
				<table border="0" style ="margin : 0 auto">
					<tr>
						<th>
							<form action="cadastroEmail.php" method="POST">		
								<input type="hidden" name="id_entidade"     value="<?php echo $id_entidade;?>">
								<input type="hidden" name="nome_entidade"    value="<?php echo $nome_entidade;?>">
								<input type="submit" value="Adicionar Email" name="cadastroEmail">					
							</form>
						</th>
					</tr>
					
					<tr>
						<th>
							<form action="cadastroTelefone.php" method="POST">	
								<input type="hidden" name="id_entidade"     value="<?php echo $id_entidade;?>">
								<input type="hidden" name="nome_entidade"    value="<?php echo $nome_entidade;?>">						
								<input type="submit" value="Adicionar Telefone" name="cadastroTelefone">				
							</form>
						</th>
					</tr>
					
					<tr>
						<th>
							<form action="cadastroEndereco.php" method="POST">	
								<input type="hidden" name="id_entidade"     value="<?php echo $id_entidade;?>">
								<input type="hidden" name="nome_entidade"    value="<?php echo $nome_entidade;?>">
								<input type="submit" value="Adicionar Endereco" name="cadastroEndereco">				
							</form>
						</th>
					</tr>
					
					<tr>
						<th>
							<a href="index.html">
								<input class="botaoTop" type="button" value="Terminar Cadastro" name="index" align="center">
							</a>
						</th>
					</tr>
					
				</table>
			</fieldset>
			

		</div>
		</center>
	</body>
</html>