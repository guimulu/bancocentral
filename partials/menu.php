<div id="div-cadastros">
	<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="index.php">Banco Central</a>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Cadastros
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="index.php?pagina=listar-banco">Banco</a>
						<a class="dropdown-item" href="index.php?pagina=listar-agencia">Agencia</a>
						<a class="dropdown-item" href="index.php?pagina=listar-cliente">Cliente</a>
						<a class="dropdown-item" href="index.php?pagina=listar-saldo">Saldos</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Movimentação</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="index.php?pagina=retirada-deposito">Retirada/Depósito</a>
						<a class="dropdown-item" href="#">Relatorio 2</a>
						<a class="dropdown-item" href="#">Relatorio 3 etc...</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Outro Menu</a>
				</li>
			</ul>
			<form class="form-inline mt-2 mt-md-0">
				<a href="php/logout.php" class="btn btn-outline-success my-2 my-sm-0">Sair</a>
			</form>
		</div>
	</nav>
</div>