<?php
   session_start();
   if(!isset($_SESSION["logado"]))
   {
	   header("location:login.php");
   }

   include("conexao.php");
?>
<!DOCTYPE html>
<head>
  <title>Painel da Loja </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Loja</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">inicio</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Estoque <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="categorias.php">Categorias</a></li>
          <li><a href="produtos.php">Produtos</a></li>
          <li><a href="vendas.php">Vendas</a></li>
        </ul>
      </li>
     <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cliente <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="clientes.php">Clientes</a></li>
          <li><a href="entregas.php">Entregas</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="perfil.php"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
      <li><a href="sair.php"><span class="glyphicon glyphicon-log-in"></span> SAIR</a></li>
    </ul>
  </div>
</nav>