<?php
   session_start();
   include("layout.php");
   
   Inicio("N");
   
   if(isset($_POST["cpf"]))
   {
	   $nome=$_POST['nome'];
	   $cpf = $_POST['cpf'];
	   $email = $_POST['email'];
	   $senha = $_POST['senha'];
	   $sexo  = $_POST['sexo'];
	   $data  = $_POST['data_nascimento'];
	   $telefone = $_POST['telefone'];
	   $endereco = $_POST['endereco'];
	   $numero = $_POST['numero'];
	   $bairro = $_POST['bairro'];
	   $cidade = $_POST['cidade'];
	   $cep = $_POST['cep'];
	   $uf = $_POST['uf'];
	   
	   $sql = "insert into clientes (cpf, nome, email, senha, sexo, data_nascimento, telefone, endereco, numero, bairro, cidade, cep, uf, data_cadastro)
			   values('$cpf','$nome','$email',sha1('$senha'),'$sexo', STR_TO_DATE('".$data."', '%Y-%m-%d'), '$telefone', '$endereco', '$numero', '$bairro', '$cidade', '$cep', '$uf', NOW())";
		
		
		include("conexao.php");
		$resultado = $conexao->query($sql);
		
		 echo "<h1 align='center'>Cadastrado com sucesso</h1>";
	   echo "<br>";
	   echo "<div align='center'><a href='login.php'>Ir para o login</a></div>";
   }
   else
   {
	   echo "<h1 align='center'>Preencha corretamente os campos</h1>";
	   echo "<br>";
	   echo "<div align='center'><a href='cadastro.php'>Voltar</a></div>";
   }
   
   Fim();
	
?>