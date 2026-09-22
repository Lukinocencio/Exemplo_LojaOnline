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

	include("conexao.php");
	include("layout.php");
	
	
	
	//se o usuario digitou alguma coisa no campo busca, entra no if, senão, mostra os produtos em destaque
	if(isset($_POST['busca']))
	{
		$busca = $_POST['busca'];
		$sql = "select * from produtos 
				where (nome_produto like '%$busca%' or detalhes like '%$busca%')";
		
		Inicio("N"); //chama a função inicio que abre o layout.
		
		echo "<br>";
		echo "<h2>Resultado da sua pesquisa:  </b>$busca</b></h2>";
		echo "<br>";
	}
	else
	{
	
		$sql = "select * from produtos 
				where destaque='S'";
				
		Inicio("S"); //chama a função inicio que abre o layout.
	}
		
	
		$resultado   = $conexao->query($sql);
		
		while($linha = $resultado->fetch_object())
		{
		    echo "<div class='produto'>";
			echo "<a href='detalhes.php?ID=$linha->id_produto'><img src='./produtos/$linha->foto_principal' class='img_produto'></a>";
			echo "<h4> $linha->nome_produto  </h4>";
			echo "<span class='valor'>R$ $linha->valor</span>";
			echo "<br>";
			echo "<br>";
			echo "<a href='add_carrinho.php?ID=$linha->id_produto'><img src='./images/btn_comprar.png'></a>";
			echo "</div>";
		}
	
	Fim(); //chama a função fim que fecha o layout.
?>