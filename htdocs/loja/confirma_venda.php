<?php
   session_start();
   include("layout.php");
   
   Inicio("N");
   
   if(isset($_POST["cep"]))
   {
		$cep         = $_POST['cep'];
		$endereco    = $_POST['endereco'];
		$numero      = $_POST['numero'];
		$bairro      = $_POST['bairro'];
		$cidade      = $_POST['cidade'];
		$uf          = $_POST['uf'];
		$forma_pagto = $_POST['forma_pagto'];
		$frete       = $_POST['frete'];
		$cpf         = $_SESSION['cpf'];
		
		$temporario = explode("*",$frete); //Quebrar a variavel frete e jogar em um vetor;
		$valor_total  = $_POST['valor_total'];
		$valor_frete  = $temporario[1];
		$prazo_entrega = $temporario[2];
		
			$sql = "insert into vendas (data_venda, cpf, forma_pagto,parcelas,endereco,numero,cidade, bairro, cep, uf, valor_total,valor_frete,prazo_entrega)
			   values(now(), '$cpf','$forma_pagto',1,'$endereco','$numero','$cidade', '$bairro', '$cep', '$uf','$valor_total','$valor_frete','$prazo_entrega')";
		
			include("conexao.php");
			$resultado = $conexao->query($sql);
		
			//Pegar cada item do carrinho e inserir na tabela item_venda
			$Indice   = $_SESSION['Indice'];
			$Carrinho = $_SESSION['Carrinho'];
			$total = 0;
		
			$id_venda = $conexao->insert_id;
			
			for($i=0; $i < $Indice; $i++)
			{
				   $ID = $Carrinho[$i];
				   $sql = "select * from produtos 
						   where  id_produto ='$ID'";	   
					$resultado = $conexao->query($sql);
					$linha = $resultado->fetch_object();
				
					$sql_item="insert into item_vendas (id_venda, id_produto,quantidade,valor) 
						      values('$id_venda','$ID','1','$linha->valor')";
							  
					$result = $conexao->query($sql_item);
			}
		
		 echo "<h1 align='center'>Venda realizada com sucesso</h1>";
	   echo "<br>";
	   session_destroy();
	   echo "<div align='center'><a href='index.php'>Sair</a></div>";
   }
   else
   {
	   echo "<h1 align='center'>Preencha corretamente os campos</h1>";
	   echo "<br>";
	   echo "<div align='center'><a href='carrinho.php'>Voltar</a></div>";
   }
   
   Fim();
	
?>