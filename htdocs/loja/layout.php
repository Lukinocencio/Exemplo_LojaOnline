<?php
 
    /*
		A função Inicio sempre exibe o Banner de produtos, 
		a não ser que seja passado o valor "N" para não exibir o banner rotativo.
	*/
	
   function Inicio($exibeBanner="S")
   {
    //iniciar a sessao
	
	if(isset($_SESSION["nome"]))
	{
		$nome = $_SESSION["nome"];
	}
	else
	{
		$nome = " Cliente";
	}
	
	//ler a variavel de sessão
	if(isset($_SESSION['Carrinho']))
	{
		$total = $_SESSION['Indice'];
	}
	else
	{
		$total = 0;
	}
	?>
	<html>
   <head>
    <meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="frete.js"></script>
	<style>
	.carousel-inner > .item > img,
	.carousel-inner > .item > a > img 
	{
		width: 90%;
		margin: auto;
		background-color: #ffffff;
	}
	
	.navbar a
	{
		color: #ffffff !important;
		
	}
	
	.navbar li
	{
		background-color: #000000 !important;
	}
	#categorias-cor
	{
		color:black;
	}
	
	.navbar .dropdown-toggle
	{
		background-color: #000000 !important;
	}

	</style>
  
  
     <link rel="stylesheet" href="styles.css">
     <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
     <script src="script.js"></script>
    
	<link href="estilo.css" type="text/css" rel="stylesheet" />
   </head>
   <body>

	<div id="menu">
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			  </button>
			  <a class="navbar-brand" href="index.php">inicio</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav">
					<li class="dropdown" >
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias
					<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<?php
							include("conexao.php");
							$sql="select * from categorias order by nome";
							$resultado = $conexao->query($sql);
							while($linha = $resultado->fetch_object())
							{
								echo "<li><a  href='categorias.php?id=$linha->id_categoria'><span>$linha->nome</span></a></li>";
							}
							?>
						</ul>
					</li>
					<li><a href="#">Nossa Loja</a></li>
					
					
					
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="carrinho.php"><span class="glyphicon glyphicon-shopping-cart"></span> Olá <?php echo $nome;?>, você possui <?php echo $total; ?> item(s) no seu carrinho. </a></li>
				
				<?php
				if(isset($_SESSION["nome"]))
				{
					echo '<li><a href="sair.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>';
				}
				else
				{
					echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
				}
				?>
			  </ul>
			</div>
		  </div>
		</nav>
	</div>
	
	<div id="topo">
		<form action="index.php" method="post">
		<div id="topo_esq">
			<img src="./images/logo.png">
		</div>
		<div id="topo_dir">
			<div class="form-group">
				
				<div class="col-sm-12">
				<label class="control-label" style="float:left; padding:5px;" for="busca">Buscar:</label>
				  <input type="text" name="busca" style="width:250px;float:left;margin-right:10px;" class="form-control" id="busca" placeholder="Digite o que procura aqui...">
				  <button class="btn btn-warning">OK</button>
				</div>
			</div>
		</div>
		</form>
	</div>
	
	<?php
	
	
	
		echo "<div id=\"conteudo\">"; //abre a Div conteudo
	
   
   }
   
   function Fim()
   {
	   
		echo "</div>"; //fecha a Div conteudo
			
		echo "<br>";
		echo "<br>";
			
		echo "<div id=\"rodape\">
			
			  </div>";
				
		echo "</body>";
		
		echo "</html>";
	
   }


?>