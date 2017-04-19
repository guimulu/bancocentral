<div id="div-login">
	<form class="form-signin" method="post" action="php/login.php">
		<h2 class="form-signin-heading">Fazer login</h2>
			<label for="usuario" class="sr-only">Usuário</label>
			<input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário" required autofocus>
			<label for="senha" class="sr-only">Senha</label>
			<input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
			<div class="checkbox">
				<label><input type="checkbox" value="remember-me"> Me lembre</label>
				</div>
			<button class="btn btn-lg btn-outline-success btn-block" type="submit">Acessar</button>
	</form>
</div>