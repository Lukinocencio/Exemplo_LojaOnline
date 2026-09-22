<?php
	include("layout.php");
	include("conexao.php");
	
	Inicio("N");
	
	$ID = $_GET['ID'];
	
	$sql = "select * from produtos where id_produto='$ID'";
	
	$resultado = $conexao->query($sql);
	
	$linha = $resultado->fetch_object();
	
	echo "<h2> $linha->nome_produto</h2>";
	
	
	echo "<div class='descricao'>";
	echo "<img class='foto' src='./produtos/$linha->foto_principal'>";
	
	
	echo "<h3>$linha->detalhes</h3>";
	
	echo "<br>";
	echo "<br>";
		
	echo "<span class='valor'>VALOR R$ $linha->valor</span>";

	echo "<br>";
	echo "<br>";
	echo "<a href='add_carrinho.php?ID=$linha->id_produto'><img src='./images/btn_comprar.png'></a>";
	
	echo "</div>";
	
	
	Fim();
?>