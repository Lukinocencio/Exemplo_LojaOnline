<?php
include("header.php");
 
	echo "<div class=\"container\">";
	echo "<h1>Olá  ".$_SESSION["nome"]."</h1>";
	
	echo "<h2> Categorias de produtos</h2>";
	
	$sql = "select * from categorias order by nome";
	
	$resultado = $conexao->query($sql);
	echo "<table class='table table-hover'>";
	echo "<tr>
			<td>Codigo</td>
			<td>Nome</td>
			<td>Situação</td>
		  </tr>";
	while($linha = $resultado->fetch_object())
	{
			echo "<tr>
			<td>$linha->id_categoria</td>
			<td>$linha->nome</td>
			<td>$linha->situacao</td>
		  </tr>";
	}		
		  
	echo "</table>";
	
	echo "<hr>";
	
	?>
	<form action="cad_categoria.php" method="post">
	<div class="form-group">
		<label for="nome">Nome da Categoria</label>
		<input type="text" class="form-control" id="nome" name="nome">
	</div>
		
	<button type="submit" class="btn btn-success">Adicionar Categoria</button>
	</form>
	
	<?php
	echo "</div>";

include("footer.php");
?>