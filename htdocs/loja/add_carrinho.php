<?php


   session_start();
   $ID = $_GET['ID'];
   //Verifica se a sessao existe.
   if(isset($_SESSION['Carrinho']))
   {
      $Indice = $_SESSION['Indice'];
	  $Carrinho = $_SESSION['Carrinho'];
   }
   else
   {
	  //não tem carrinho ainda, cria um vazio
	  $Indice = 0;
	  $Carrinho = "";
   }
   //Adiciona o produto no indice do carrinho
   $Carrinho[$Indice] = $ID;
   $Indice++; //atualiza o indice  
   //Adiciona as variaveis na sessao
   $_SESSION['Indice'] = $Indice;
   $_SESSION['Carrinho'] = $Carrinho;
   header("Location:index.php");
?>



