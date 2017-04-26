<?php
	include './php/connect_bd.php';

	$id = '';
	$nome = '';
	$nr_agencia = '';
	$id_banco = '';
	$endereco = '';
	$cidade = '';
	$id_uf = '';
	$cep = '';
	
	$mensagem = 'Dados Salvos Com Sucesso!';

	if (!empty($_POST['id'])) {
			//$id = $_POST['id'];
			$nome = $_POST['nome'];
			$nr_agencia = $_POST['nr_agencia'];
			$id_banco = $_POST['id_banco'];
			$endereco = $_POST['endereco'];
			$cidade = $_POST['cidade'];
			$id_uf = $_POST['id_uf'];
			$cep = $_POST['cep'];

			$sql = "UPDATE bc_agencias SET nome='$nome', nr_agencia='$nr_agencia', id_banco='$id_banco', endereco='$endereco', cidade='$cidade', id_uf='$id_uf', cep='$cep' WHERE id = {$_POST['id']}";
			mysql_query($sql);
			echo $mensagem;
			header('location: /bancocentral/index.php?pagina=listar-agencia');
		} else  if (!empty($_POST['nr_agencia'])){
			$nome = $_POST['nome'];
			$nr_agencia = $_POST['nr_agencia'];
			$id_banco = $_POST['id_banco'];
			$endereco = $_POST['endereco'];
			$cidade = $_POST['cidade'];
			$id_uf = $_POST['id_uf'];
			$cep = $_POST['cep'];

			$sql = "INSERT INTO bc_agencias (nome, nr_agencia, id_banco, endereco, cidade, id_uf, cep) VALUES ('$nome', '$nr_agencia', '$id_banco', '$endereco', '$cidade', '$id_uf', '$cep')";
		
			$resultado = mysql_query($sql);
			echo $mensagem;		
			header('location: /bancocentral/index.php?pagina=listar-agencia');
		} else if (isset($_GET['id'])) {
			$sql = "SELECT * FROM bc_agencias where id = {$_GET['id']}";
			$resultado = mysql_query($sql);
			$row = mysql_fetch_assoc($resultado);
			
			$id = $row['id'];
			$nome = $row['nome'];
			$nr_agencia = $row['nr_agencia'];
			$id_banco = $row['id_banco'];
			$endereco = $row['endereco'];
			$cidade = $row['cidade'];
			$id_uf = $row['id_uf'];
			$cep = $row['cep'];
		}
?>

<div style="margin-top: 65px;">
	<form action="" method="post">
		<div class="row margin-align">
			<input type="hidden" name="id" value="<?=$id?>">
			<div class="form-group col-xs-12 col-md-3">	
				<label>Nome</label><br>
				<input type="text" name="nome" value="<?=$nome?>" maxlength="60" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-6">
				<label>Nº Agência</label><br>
				<input type="text" name="nr_agencia" value="<?=$nr_agencia?>" maxlength="5" onkeyup="somenteNumeros(this);" class="width-max" required>
			</div>	
			<div class="form-group col-xs-12 col-md-3">
				<label>Banco</label><br>
				<select class="form-control width-max" name="id_banco"  id="bancos" required>
				<?php $sql = "SELECT * FROM bc_bancos ORDER BY codigo";
					$resultado = mysql_query($sql);
					while ($bancos = mysql_fetch_assoc($resultado)) { ?>
					<option value="<?php echo $bancos['id'];?>"><?php echo $bancos['codigo']." - ".$bancos['nome'] ?></option>
				<?php } ?>
				</select>
			</div>
			<div class="form-group col-xs-12 col-md-3">	
				<label>Endereço</label><br>
				<input type="" name="endereco" value="<?=$endereco?>" maxlength="120" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-6">
				<label>Cidade</label><br>
				<input type="text" name="cidade" value="<?=$cidade?>" maxlength="60" class="width-max" required>
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
			<div class="form-group col-xs-12 col-md-3">
				<label>CEP</label><br>
				<input type="text" name="cep" value="<?=$cep?>" maxlength="7" onkeyup="somenteNumeros(this);" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-12">	
				<button class="btn btn-success" name="enviar" type="submit">Salvar</button>
				<a href="index.php?pagina=listar-agencia" class="btn btn-danger my-2 my-sm-0">Sair</a>
			</div>
		</div>
	</form>
</div>