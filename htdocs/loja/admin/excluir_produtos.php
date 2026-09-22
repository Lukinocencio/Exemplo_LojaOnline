<?php
	//Excluir de Produtos

	if(isset($_GET["ID"]))
	{
		include("header.php");
		
		$id_produto  = $_GET["ID"];
		
		
		$sql = "delete from produtos where id_produto='$id_produto'";
		$resultado = $conexao->query($sql);
		
		echo "<h1 align='center'>Excluido com sucesso!</h1>";
		echo "<br>";
		echo "<p align='center'><a href='produtos.php' class='btn btn-success'>Volar</a></p>";
		
		include("footer.php");
	}
	else
	{
		header("Location:produtos.php");
	}
?>