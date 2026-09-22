<?php
include("header.php");
 
	echo "<div class=\"container\">";
	echo "<h1>Olá  ".$_SESSION["nome"]."</h1>";
	
	echo "<h2> Relação de clientes</h2>";
	
	$sql = "select * from clientes order by data_cadastro DESC";
	
	$resultado = $conexao->query($sql);
	echo "<table class='table table-hover'>";
	echo "<tr>
			<td>Data de Cadastro</td>
			<td>CPF</td>
			<td>Nome</td>
			<td>Email</td>
			<td>Telefone</td>
			<td>Endereço</td>
			<td>Número</td>
			<td>Bairro</td>
			<td>Cidade</td>
			<td>UF</td>
			<td>Situação</td>
		  </tr>";
	while($linha = $resultado->fetch_object())
	{
			$data_cadastro = date("d/m/Y H:i", strtotime($linha->data_cadastro));
			echo "<tr>
			<td>$data_cadastro</td>
			<td>$linha->cpf</td>
			<td>$linha->nome</td>
			<td>$linha->email</td>
			<td>$linha->telefone</td>
			<td>$linha->endereco</td>
			<td>$linha->numero</td>
			<td>$linha->bairro</td>
			<td>$linha->cidade</td>
			<td>$linha->uf</td>
			<td>$linha->situacao</td>
		  </tr>";
	}		
		  
	echo "</table>";
	
	echo "<hr>";
	
	
	echo "</div>";

include("footer.php");
?>
