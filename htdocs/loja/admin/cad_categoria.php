<?php


	if(isset($_POST["nome"]))
	{
		include("header.php");
		
		$nome =$_POST["nome"];
		
		$sql = "insert into categorias (nome,situacao) values ('$nome','Ativo')";
		$resultado = $conexao->query($sql);
		
		echo "<h1 align='center'>Cadastrado com sucesso!</h1>";
		echo "<br>";
		echo "<p align='center'><a href='categorias.php' class='btn btn-success'>Volar</a></p>";
		
		include("footer.php");
	}
	else
	{
		header("Location:categorias.php");
	}
?>