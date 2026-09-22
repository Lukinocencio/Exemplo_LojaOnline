<?php
   session_start();
   
   include("layout.php");
   
   Inicio("N");
   
   ?>
   <h1> Olá, seja bem vindo! </h1>
   
  
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
	
	.container h2
	{
		text-align:center;
		color: #666;
	}
  </style>

 
  
  <?php
     if(isset($_POST['login']))
	 {
		
		$login = $_POST['login'];
		$senha = sha1($_POST['senha']);
		
		include("conexao.php");
		
		$sql = "select nome, senha as 'senha', cpf 
				from clientes 
			    where email='$login' and situacao='Ativo'";
		
		//echo "$sql";
		
		$resultado = $conexao->query($sql);
		
		if($resultado->num_rows > 0)
		{
			$linha     = $resultado->fetch_object();
			
			$senhaBD = $linha->senha;
			$nome    = $linha->nome;
			$cpf    = $linha->cpf;
			
			if($senha == $senhaBD)
			{
				
				$_SESSION['logado'] = "sim";
				$_SESSION['nome']   = $nome;
				$_SESSION['cpf']   = $cpf;
				
				header("location:index.php");
			}
			else
			{
				echo '<div class="alert alert-warning">
						<strong>Aviso!</strong> Senha ou usuario inválido!
					 </div>';
				echo "<a href='login.php'>Voltar</a>";
			}
		}
		else
		{
			echo '<div class="alert alert-warning">
						<strong>Aviso!</strong> Senha ou usuario inválido!
					 </div>';
				echo "<a href='login.php'>Voltar</a>";
		}
	 }
	 else
	 {
			?>
			<div class="container" >
			  <h2>Entre com sua conta</h2>
			  <br>
			  <form action="login.php" method="post" role="form">
				<div class="form-group">
				  <label for="login">Email:</label>
				  <input type="text" class="form-control" name="login" id="login" placeholder="Informe o seu usuário" required>
				</div>
				<div class="form-group">
				  <label for="senha">Senha:</label>
				  <input type="password" class="form-control" name="senha" id="senha" placeholder="Informe sua senha" required>
				</div>
				
				<button type="submit" class="btn btn-primary">Entrar</button>
				
				<a href="cadastro.php" class="btn btn-success">Cadastre-se aqui</a>
			  </form>
			</div>
			<?php
	 }

   
    Fim();
	
?>