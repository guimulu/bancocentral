<?php
	include './php/connect_bd.php';

	$id = '';
	$nome = '';
	$cpf = '';
	$rg = '';
	$rua = '';
	$numero = '';
	$cep = '';
	$complemento = '';
	$telefone = '';
	$cidade = '';
	$id_uf = '';
	$data_inicial = '';
	$id_agencia = '';
	$ativo = '';
	$tipo_conta = '';

	$mensagem = 'Dados Salvos Com Sucesso!';

	if (!empty($_POST['id'])) {
			
		} else  if (!empty($_POST['nome'])){
			//$id = $_POST['id'];
			$nome = $_POST['nome'];
			$cpf = $_POST['cpf'];
			$rg = $_POST['rg'];
			$rua = $_POST['rua'];
			$numero = $_POST['numero'];
			$cep = $_POST['cep'];
			$complemento = $_POST['complemento'];
			$telefone = $_POST['telefone'];
			$cidade = $_POST['cidade'];
			$id_uf = $_POST['id_uf'];
			$data_inicial = $_POST['data_inicial'];
			$id_agencia = $_POST['id_agencia'];
			$ativo = $_POST['ativo'];
			$conta = rand(10000000 , 99999999);
			$tipo_conta = $_POST['tipo_conta'];

			$sql = "INSERT INTO bc_clientes (cpf, rg, nome, rua, numero, cep, complemento, telefone, cidade, id_uf, data_inicial, id_agencia, ativo, conta, data_inclusao, tipo_conta) VALUES ('$cpf', '$rg','$nome', '$rua', '$numero', '$cep', '$complemento', '$telefone', '$cidade', '$id_uf', '$data_inicial', '$id_agencia', 1, '$conta', CURRENT_TIMESTAMP, '$tipo_conta')";

			//var_dump($sql);
			//exit;
			$resultado = mysql_query($sql);
			echo $mensagem;		
			header('location: /bancocentral/index.php?pagina=listar-cliente');
		}
?>

<div style="margin-top: 65px;">
	<form action="" method="post">
		<div class="row margin-align">
			<input type="hidden" name="id" value="<?=$id?>">
			<div class="form-group col-xs-12 col-md-6">	
				<label>Nome</label><br>
				<input type="text" name="nome" value="<?=$nome?>" maxlength="60" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-3">
				<label>CPF</label><br>
				<input type="text" name="cpf" value="<?=$cpf?>" maxlength="11" onkeyup="somenteNumeros(this);" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-3">
				<label>RG</label><br>
				<input type="text" name="rg" value="<?=$rg?>" maxlength="10" onkeyup="somenteNumeros(this);" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-3">
				<label>Tipo de Conta</label><br>
				<select class="form-control width-max" name="tipo_conta" id="tipo-conta" required>
				    <option value="poupanca">Poupança</option>
				    <option value="corrente">Corrente</option>
				</select>
			</div>
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
				<label>Complemento</label><br>
				<input type="text" name="complemento" value="<?=$complemento?>" maxlength="120" class="width-max">
			</div>
			<div class="form-group col-xs-12 col-md-3">
				<label>Telefone</label><br>
				<input type="text" name="telefone" value="<?=$telefone?>" maxlength="16" onkeyup="somenteNumeros(this);" class="width-max" required>
			</div>
			<div class="form-group col-xs-12 col-md-3">
				<label>Agencia</label><br>
				<select class="form-control width-max" name="id_agencia"  id="agencias" required>
				<?php $sql = "SELECT * FROM bc_agencias ORDER BY nr_agencia";
					$resultado = mysql_query($sql);
					while ($agencias = mysql_fetch_assoc($resultado)) { ?>
					<option value="<?php echo $agencias['id'];?>"><?php echo $agencias['nr_agencia']." - ".$agencias['nome'] ?></option>
				<?php } ?>
				</select>
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