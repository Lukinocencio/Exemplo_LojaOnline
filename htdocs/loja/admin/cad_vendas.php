<?php
	//Cadastro de Vendas

	if(isset($_POST["nome"]))
	{
		include("header.php");
		
		$nome  = $_POST["nome"];
		$valor = $_POST["valor"];
		$id_categoria = $_POST["id_categoria"];
		$quantidade = $_POST["quantidade"];
		
		$sql = "insert into produtos (id_categoria, nome_produto, valor, quantidade) 
				values ('$id_categoria','$nome','$valor','$quantidade')";
		$resultado = $conexao->query($sql);
		
		echo "<h1 align='center'>Cadastrado com sucesso!</h1>";
		echo "<br>";
		echo "<p align='center'><a href='produtos.php' class='btn btn-success'>Volar</a></p>";
		
		include("footer.php");
	}
	else
	{
		header("Location:produtos.php");
	}
?>