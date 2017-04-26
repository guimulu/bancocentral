<?php
	include './php/connect_bd.php';

	$id = '';
	$codigo = '';
	$nome = '';
	$cnpj = '';
	$mensagem = 'Dados Salvos Com Sucesso!';

	if (!empty($_POST['id'])) {
			$codigo = $_POST['codigo'];
			$nome = $_POST['nome'];
			$cnpj = $_POST['cnpj'];
			$sql = "UPDATE bc_bancos SET codigo = '$codigo', nome = '$nome', cnpj = '$cnpj' 
				WHERE id = {$_POST['id']}";
			mysql_query($sql);
			echo $mensagem;
			header('location: /bancocentral/index.php?pagina=listar-banco');
		} else  if (!empty($_POST['codigo'])){
			$codigo = $_POST['codigo'];
			$nome = $_POST['nome'];
			$cnpj = $_POST['cnpj'];
			$sql = "INSERT INTO bc_bancos (codigo, nome, cnpj) VALUES ('$codigo', '$nome', '$cnpj')";
			$resultado = mysql_query($sql);
			echo $mensagem;		
			header('location: /bancocentral/index.php?pagina=listar-banco');
		} else if (isset($_GET['id'])) {
			$sql = "SELECT * FROM bc_bancos where id = {$_GET['id']}";
			$resultado = mysql_query($sql);
			$row = mysql_fetch_assoc($resultado);
			
			$id = $row['id'];
			$codigo = $row['codigo'];
			$nome = $row['nome'];
			$cnpj = $row['cnpj'];
		}
?>

<div style="margin-top: 65px;">
	<form action="" method="post">
		<div class="row margin-align">
			<input type="hidden" name="id" value="<?=$id?>">
			<div class="form-group col-xs-12 col-md-3">	
				<label>Codigo</label><br>
				<input type="text" name="codigo" value="<?=$codigo?>" maxlength="5" onkeyup="somenteNumeros(this);" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-6">
				<label>Nome</label><br>
				<input type="text" name="nome" value="<?=$nome?>" maxlength="60" class="width-max" required>
			</div>	
			<div class="form-group col-xs-12 col-md-3">
				<label>CNPJ</label><br>
				<input type="text" name="cnpj" value="<?=$cnpj?>" maxlength="14" onkeyup="somenteNumeros(this);" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-12">	
				<button class="btn btn-success" name="enviar" type="submit">Salvar</button>
				<a href="index.php?pagina=listar-banco" class="btn btn-danger my-2 my-sm-0">Sair</a>
			</div>
		</div>
	</form>
</div>