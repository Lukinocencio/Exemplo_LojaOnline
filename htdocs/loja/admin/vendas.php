<?php
include("header.php");
 
	echo "<div class=\"container\">";
	echo "<h1>Olá  ".$_SESSION["nome"]."</h1>";
	
	echo "<h2> Relação de vendas</h2>";
	
	$sql = "select * from vendas order by data_venda";
	
	$resultado = $conexao->query($sql);
	echo "<table class='table table-hover'>";
	echo "<tr>
			<td>Data da venda </td>
			<td>Cpf </td>
			<td>Forma de pagamento</td>
			<td>Parcelas</td>
			<td>Valor total</td>
			<td>Valor do frete</td>
			<td>Endereço</td>
			<td>Número</td>
			<td>Bairro</td>
			<td>Cidade</td>
			<td>Cep</td>
			<td>Uf</td>
			<td>Situação</td>

		  </tr>";
	while($linha = $resultado->fetch_object())
	{
			echo "<tr>
			<td>$linha->data_venda</td>
			<td>$linha->cpf</td>
			<td>$linha->forma_pagto</td>
			<td>$linha->parcelas</td>
			<td>$linha->valor_total</td>
			<td>$linha->valor_frete</td>
			<td>$linha->endereco</td>
			<td>$linha->numero</td>
			<td>$linha->bairro</td>
			<td>$linha->cidade</td>
			<td>$linha->cep</td>
			<td>$linha->uf</td>
			<td>$linha->situacao</td>
			
		  </tr>";
	}		
		  
	echo "</table>";
	
	echo "<hr>";
	
	
	echo "</div>";

include("footer.php");
?>