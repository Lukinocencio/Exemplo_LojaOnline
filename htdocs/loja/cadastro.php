<?php
   session_start();
   include("layout.php");
   
   Inicio("N");
?>
<div class="container" >
			  <h2>Entre com sua conta</h2>
			  <br>
			  <form action="confirma_cadastro.php" method="post" role="form">
				<div class="form-group">
				  <label for="login">CPF:</label>
				  <input type="text" class="form-control" name="cpf" required>
				</div>
				
				<div class="form-group">
				  <label for="login">Nome:</label>
				  <input type="text" class="form-control" name="nome" required>
				</div>
				
				<div class="form-group">
				  <label for="login">Email:</label>
				  <input type="text" class="form-control" name="email" required>
				</div>
				
				<div class="form-group">
				  <label for="senha">Senha:</label>
				  <input type="password" class="form-control" name="senha" id="senha" placeholder="Informe sua senha" required>
				</div>
				
				<div class="form-group">
				  <label for="login">Sexo:</label>
				  <select class="form-control" name="sexo">
					<option value="M">Masculino</option>
					<option value="F">Feminino</option>
				  </select>
				</div>
				
				<div class="form-group">
				  <label for="login">Data de nascimento:</label>
				  <input type="date" class="form-control" name="data_nascimento" required>
				</div>
				
				<div class="form-group">
				  <label for="login">Telefone:</label>
				  <input type="text" class="form-control" name="telefone" required>
				</div>
				
				<div class="form-group">
				  <label for="login">Endereço:</label>
				  <input type="text" class="form-control" name="endereco" required>
				</div>
				
				<div class="form-group">
				  <label for="numero">Número:</label>
				  <input type="text" class="form-control" name="numero" required>
				</div>
				
				<div class="form-group">
				  <label for="login">Bairro:</label>
				  <input type="text" class="form-control" name="bairro" required>
				</div>
				
				<div class="form-group">
				  <label for="login">Cidade:</label>
				  <input type="text" class="form-control" name="cidade" required>
				</div>
				
				<div class="form-group">
				  <label for="login">Cep:</label>
				  <input type="text" class="form-control" name="cep" required>
				</div>
				
				<div class="form-group">
				  <label for="login">UF:</label>
				  <input type="text" class="form-control" name="uf" required>
				</div>
				
				
				<button type="submit" class="btn btn-primary">Confirma Cadastro</button>
				
				<a href="index.php" class="btn btn-warning">Voltar</a>
			  </form>
			</div>
<?php
 Fim();
	
?>