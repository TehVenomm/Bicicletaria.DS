<?php
	if(isset($_POST["enviarEstado"])){

		$estadoEscolhido = $_POST['estado'];
		echo 'Cidades:<br>';
		echo '<select name="cidade">';
		echo '<option value="-"></option>';

		include "conexao.php";
		$sql = "SELECT * FROM cidade WHERE idEstado = ? ORDER BY nome";
		$contatos = $conex -> prepare($sql);
		$contatos -> execute(array($estadoEscolhido));
		$contatos -> execute();
		
		foreach($contatos as $bolacha)
		{
				$id_cidade = $bolacha['idCidade'];
				$nome_cidade = $bolacha['nome'];
				echo "<option value='$id_cidade' charset='UTF-8'>$nome_cidade</option>";
		}
		$contatos = NULL;
		
		
		echo '</select>';
	} else {
		echo 
		'<p>
			<input type="submit" value="enviarEstado" name="enviarEstado">
		</p>';
	}
?>