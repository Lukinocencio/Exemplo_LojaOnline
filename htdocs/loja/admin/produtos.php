<?php
include("header.php");
 
	echo "<div class=\"container\">";
	echo "<h1>Olá  ".$_SESSION["nome"]."</h1>";
	
	echo "<h2> Relação de produtos</h2>";
	
	$sql = "select * from produtos order by nome_produto";
	
	$resultado = $conexao->query($sql);
	echo "<table class='table table-hover'>";
	echo "<tr>
			<td>Codigo</td>
			<td>Nome do produto</td>
			<td>Valor</td>
			<td>Quantidade</td>
			<td>Excluir</td>
		  </tr>";
	while($linha = $resultado->fetch_object())
	{
			echo "<tr>
			<td>$linha->id_produto</td>
			<td>$linha->nome_produto</td>
			<td>$linha->valor</td>
			<td>$linha->quantidade</td>
			<td><a href='excluir_produtos.php?ID=$linha->id_produto'><img src='./includes/img/delete.png'></a></td>
		  </tr>";
	}		
		  
	echo "</table>";
	
	echo "<hr>";
	
	?>
	<form action="cad_produtos.php" method="post">
	<div class="form-group">
		<label for="nome">Categoria</label>
		<?php
		   //Buscar no Banco de Dados, todos os produtos...
			$sql = "select * from categorias order by nome";
			$resultado = $conexao->query($sql);
			echo "<select name='id_categoria' class='form-control'>";
			while($linha = $resultado->fetch_object())
			{
				echo "<option value='$linha->id_categoria'>$linha->nome</option>";
			}
			echo "</select>";
		?>
	</div>
	
	<div class="form-group">
		<label for="nome">Nome da produto</label>
		<input type="text" class="form-control"  name="nome">
	</div>
	
	
	<div class="form-group">
		<label for="nome">Valor</label>
		<input type="text" class="form-control"  name="valor">
	</div>
	
	<div class="form-group">
		<label for="nome">Quantidade</label>
		<input type="text" class="form-control"  name="quantidade">
	</div>
		
	<button type="submit" class="btn btn-success">Adicionar Produto</button>
	</form>
	
	<?php
	echo "</div>";

include("footer.php");
?>