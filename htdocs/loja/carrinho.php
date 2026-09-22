<?php
   session_start();
   include("layout.php");
   
   Inicio("N");
   
   echo '<form action="confirma_venda.php" method="post">';
   echo "<br>";
   echo "<h2>Veja o(s) item(s) do seu Carrinho de Compras</h2>";
   echo "<br>";
   
   include("conexao.php");
   //Verifica se a sessao existe.
    if(isset($_SESSION['Carrinho']))
    {
		$Indice = $_SESSION['Indice'];
		$Carrinho = $_SESSION['Carrinho'];
		
		echo "<div class=\"panel panel-default\">
				<div class=\"panel-heading\">Produtos</div>
				<div class=\"panel-body\">";
		
		echo "<table class=\"table table-hover\" width='96%' align='center'>";
		echo "<thead><tr>
			  <td>Foto do Produto</td>
			  <td>Nome do Produto</td>
			  <td>Valor do Produto</td>
			  <td>Qtd</td>
			  <td>Excluir</td>
		</tr></thead>";
		$total = 0;
		
		for($i=0; $i < $Indice; $i++)
		{
		   $ID = $Carrinho[$i];
		   $sql = "select * from produtos 
				   where  id_produto ='$ID'";	   
			$resultado = $conexao->query($sql);
			$linha = $resultado->fetch_object();
			echo "<tr>
			  <td><img src='./produtos/$linha->foto_principal' class='foto_carrinho'></td>
			  <td>$linha->nome_produto</td>
			  <td>R$ $linha->valor</td>
			  <td>01 unid.</td>
			  <td><a href='removeCarrinho.php?id=$linha->id_produto'><img src='./images/delete.png'></a></td>
		    </tr>";
			
			$total += $linha->valor;
		}//fecha o for
		
		echo "<tr>
			  <td colspan='2'>Total</td>
			  <td colspan='3'>R$ ".sprintf("%0.2f",$total)."";
			  echo "<input type='hidden' name='valor_total' value='$total'>";
			  echo "</td>
			 </tr>";
		
		echo "</table>";
		echo "</div>
			</div>
			";
		
		
		
		echo "<div class=\"panel panel-default\">
				<div class=\"panel-heading\">Calculo do Frete</div>
				<div class=\"panel-body\">";
		echo "       <div style='float:left;'>Calcule o frete e o prazo 
					    <input type='text' id='cep' maxlength='8' class='form-control' style='width:70%!important; float:left'> ";
		echo "          <button type=\"button\" id='btn_frete' class=\"btn btn-danger\" style='float:left'>Calcular Frete</button>";
		
		echo "			<p id='resultado'></p>";
		
		echo "       </div>
			    </div>
			  </div>";
		

		echo "<div class=\"panel panel-default\">
				   <div class=\"panel-heading\">Endereço de Entrega</div>
				   <div class=\"panel-body\">";
		
		echo '	<div class="form-group">
					<label for="venda">Endereço</label>
					<input type="text" class="form-control"  name="endereco" required>
				</div>';
				
		echo '	<div class="form-group">
					<label for="numero">Número</label>
					<input type="text" class="form-control"  name="numero" required>
				</div>';
		
		echo '	<div class="form-group">
					<label for="venda">Bairro</label>
					<input type="text" class="form-control"  name="bairro" required>
				</div>';
				
		echo '	<div class="form-group">
					<label for="venda">Cidade</label>
					<input type="text" class="form-control"  name="cidade" required>
				</div>';
		
		echo '	<div class="form-group">
					<label for="venda">CEP</label>
					<input type="text" class="form-control"  name="cep" id="cep_endereco" required>
				</div>';
				
		echo '	<div class="form-group">
					<label for="venda">UF</label>
					<input type="text" class="form-control"  name="uf" required>
				</div>';
				
		echo "    </div>
			   		  
			 </div>";

		echo "<div class=\"panel panel-default\">
				   <div class=\"panel-heading\"><input type='radio' name='forma_pagto' value='cartao' checked>Pagamento com Cartão</div>
				   <div class=\"panel-body\">";
		
		echo '	<div class="form-group">
					<label for="venda">Nome do Titular</label>
					<input type="text" class="form-control"  name="nome_titular">
				</div>';
				
		echo '	<div class="form-group">
					<label for="venda">Numero do Cartão</label>
					<input type="text" class="form-control"  name="numero">
				</div>';
				
		echo '	<div class="form-group">
					<label for="venda">Validade</label>
					<input type="text" class="form-control"  name="validade">
				</div>';
		
		echo '	<div class="form-group">
					<label for="venda">Código de Segurança</label>
					<input type="text" class="form-control"  name="codigo">
				</div>';
				
		echo '	<div class="form-group">
					<label for="venda">Parcelar em </label>
					<select name="parcelas" class="form-control">';
					for($i=1;$i<=12;$i++)
					{
						$parcela = sprintf("%0.2f",$total/$i);
						echo "<option value='$parcela'>$i x R$ $parcela </option> \n";
					}
					
		echo '		</select>
				</div>';
				   
		echo "    </div>
			   		  
			 </div>";
		
		
		echo "<div class=\"panel panel-default\">
				   <div class=\"panel-heading\"><input type='radio' name='forma_pagto' value='boleto'> Boleto Bancário a vista</div>
				   <div class=\"panel-body\">";
		echo "    <h3> 1 parcela de R$ ".sprintf("%0.2f",$total)."</h3>";
		
		echo "			<img src='./images/boleto.jpg' width='150' height='100'>";
		echo "    </div>
			   		  
			 </div>";
		
		//Adicionar o Botao que Finaliza a Venda
		if(isset($_SESSION['logado']) && $_SESSION['logado'] == "sim")
		{
			echo "<div align='center'>";
			echo "<button type='submit' class='btn btn-primary'>Finalizar Pedido</button>"; 
			echo "</div>";
		}
		else
		{
			echo "<h3>Faça o login para finalizar o pedido!</h3>";
		}
		
		echo "</form>";	
	}
	else
	{
	   echo "Não há itens no carrinho";
	}
    Fim();
	
?>