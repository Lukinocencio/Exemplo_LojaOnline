<!DOCTYPE html>
<html lang="en">
<head>
  <title>Loja</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <style>
    body{
	margin:0px;
	padding:0px;
	background:url('includes/img/fundo.jpg');
  }

  
    .container
	{
		width:300px;
		min-width:200px;
		margin: 10% auto 0px auto;
		border:1px solid #eaeaea;
		padding:20px;
		border-radius:10px;
		box-shadow: 5px 5px 5px #666;
		background-color:#ffffff;
	}
	.btn
	{
		width:100%;
	}
	.container h2
	{
		text-align:center;
		color: #666;
	}
  </style>
  </head>
<body>
 
  
  <?php
     if(isset($_POST['login']))
	 {
		
		$login = $_POST['login'];
		$senha = sha1($_POST['senha']);
		
		include("conexao.php");
		
		$sql = "select nome, senha as 'senha' 
				from usuarios 
			    where login='$login' and situacao='Ativo'";
		 
		$resultado = $conexao->query($sql);
		
		if($resultado->num_rows > 0)
		{
			$linha     = $resultado->fetch_object();
			
			$senhaBD = $linha->senha;
			$nome    = $linha->nome;
			if($senha == $senhaBD)
			{
				session_start();
				$_SESSION['logado'] = "sim";
				$_SESSION['nome'] = $nome;
				header("location:index.php");
			}
			else
			{
				echo '<div class="alert alert-warning">
						<strong>Aviso!</strong> Senha inválido!
					 </div>';
				echo "<a href='login.php'>Voltar</a>";
			}
		}
		else
		{
			echo '<div class="alert alert-warning">
						<strong>Aviso!</strong> Usuário inválido!
					 </div>';
				echo "<a href='login.php'>Voltar</a>";
		}
	 }
	 else
	 {
			?>
			<div class="container" >
			  <h2>IDENTIFICAÇÃO</h2>
			  <br>
			  <form action="login.php" method="post" role="form">
				<div class="form-group">
				  <label for="login">Usuário:</label>
				  <input type="text" class="form-control" name="login" id="login" placeholder="Informe o seu usuário" required>
				</div>
				<div class="form-group">
				  <label for="senha">Senha:</label>
				  <input type="password" class="form-control" name="senha" id="senha" placeholder="Informe sua senha" required>
				</div>
				
				<button type="submit" class="btn btn-primary">Enviar Dados</button>
			  </form>
			</div>
			<?php
	 }
	 ?>

</body>
</html>
