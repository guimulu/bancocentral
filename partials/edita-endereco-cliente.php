<?php
	include './php/connect_bd.php';

	$id = '';
	$rua = '';
	$numero = '';
	$cep = '';
	$complemento = '';
	$telefone = '';
	$cidade = '';
	$id_uf = '';
	$data_inicial = '';

	$mensagem = 'Dados Salvos Com Sucesso!';

	if (!empty($_POST['id'])) {
			//$id = $_POST['id'];
			$rua = $_POST['rua'];
			$numero = $_POST['numero'];
			$cep = $_POST['cep'];
			$complemento = $_POST['complemento'];
			$telefone = $_POST['telefone'];
			$cidade = $_POST['cidade'];
			$id_uf = $_POST['id_uf'];
			$data_inicial = $_POST['data_inicial'];

			$sql = "UPDATE bc_clientes SET rua='$rua', numero='$numero', cep='$cep', complemento='$complemento', telefone='$telefone', cidade='$cidade', id_uf='$id_uf', data_inicial='$data_inicial' WHERE id = {$_POST['id']}";
			mysql_query($sql);
			echo $mensagem;
			header('location: /bancocentral/index.php?pagina=listar-cliente');
		} else if (isset($_GET['id'])) {
			$sql = "SELECT * FROM bc_clientes where id = {$_GET['id']}";
			$resultado = mysql_query($sql);
			$row = mysql_fetch_assoc($resultado);

			$id = $row['id'];
			$rua = $row['rua'];
			$numero = $row['numero'];
			$cep = $row['cep'];
			$complemento = $row['complemento'];
			$telefone = $row['telefone'];
			$cidade = $row['cidade'];
			$data_inicial = $row['data_inicial'];
			$id_uf = $row['id_uf'];

			//var_dump($row);
		}
?>

<div style="margin-top: 65px;">
	<form action="" method="post">
		<div class="row margin-align">
			<input type="hidden" name="id" value="<?=$id?>">
			<div class="form-group col-xs-12 col-md-4">	
				<label>Rua</label><br>
				<input type="text" name="rua" value="<?=$rua?>" maxlength="60" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-2">
				<label>Número</label><br>
				<input type="text" name="numero" value="<?=$numero?>" maxlength="4" onkeyup="somenteNumeros(this);" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-2">
				<label>CEP</label><br>
				<input type="text" name="cep" value="<?=$cep?>" maxlength="7" onkeyup="somenteNumeros(this);" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-4">	
				<label>complementolemento</label><br>
				<input type="text" name="complemento" value="<?=$complemento?>" maxlength="120" class="width-max">
			</div>			
			<div class="form-group col-xs-12 col-md-3">
				<label>Telefone</label><br>
				<input type="text" name="telefone" value="<?=$telefone?>" maxlength="16" onkeyup="somenteNumeros(this);" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-6">
				<label>Cidade</label><br>
				<input type="text" name="cidade" value="<?=$cidade?>" maxlength="60" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-3">
				<label>Data Inicial de Moradia</label><br>
				<input type="text" name="data_inicial" value="<?=$data_inicial?>" maxlength="8" onkeyup="somenteNumeros(this);" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-3">
				<label>UF</label><br>
				<select class="form-control width-max" name="id_uf" id="estados" required>
				<?php $sql = "SELECT * FROM bc_estados ORDER BY sigla";
					$resultado = mysql_query($sql);
					while ($estados = mysql_fetch_assoc($resultado)) { ?>
				    <option value="<?php echo $estados['id'];?>"><?php echo $estados['sigla'] ?></option>
				  <?php } ?>
				  </select>
			</div>
			<div class="form-group col-xs-12 col-md-12">	
				<button class="btn btn-success" name="enviar" type="submit">Salvar</button>
				<a href="index.php?pagina=listar-cliente" class="btn btn-danger my-2 my-sm-0">Sair</a>
			</div>
		</div>
	</form>
</div>