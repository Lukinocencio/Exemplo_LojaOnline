<?php
    //iniciar a sessao
	session_start();
	
	//ler a variavel de sessão
	if(isset($_SESSION['Carrinho']))
	{
		$total = $_SESSION['Indice'];
	}
	else
	{
		$total = 0;
	}
	
	
	
    include("layout.php");
    include("conexao.php");
	
	Inicio("N");
	
	$categoria = $_GET['id'];
	
	//Pegar o nome da categoria
	$sql = "select nome from categorias where id_categoria='$categoria'";
	$resultado   = $conexao->query($sql);
	
	$nomeCategoria = $resultado->fetch_object()->nome;
	
	echo "<h2>Você está na categoria $nomeCategoria</h2>";
	
		$sql = "select * from produtos 
				where id_categoria='$categoria'";
		
		$resultado   = $conexao->query($sql);
		
		
		while($linha = $resultado->fetch_object())
		{
		    echo "<div class='produto'>";
			echo "<a href='detalhes.php?ID=$linha->id_produto'><img src='./produtos/$linha->foto_principal' class='img_produto'></a>";
			echo "<h3> $linha->nome_produto </h3>";
			echo "<span class='valor'>R$ $linha->valor</span>";
			echo "<br>";
			echo "<br>";
			echo "<a href='add_carrinho.php?ID=$linha->id_produto'><img src='./images/btn_comprar.png'></a>";
			echo "</div>";
		}
	
	
	
	Fim();
	
	?>
	