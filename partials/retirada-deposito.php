<?php
	include './php/connect_bd.php';

	$id = '';
	$valor = '';
	$id_cliente = '';
	$data_hora = '';
	$tipo_mov= '';
	
	$mensagem = 'Dados Salvos Com Sucesso!';
	if (!empty($_POST['valor'])){
		$valor = $_POST['valor'];
		$id_cliente = $_POST['id_cliente'];
		$tipo_mov = $_POST['tipo_mov'];

		if($_POST['tipo_mov'] == 'retirada'){
			$sql = "SELECT saldo FROM bc_clientes WHERE id = $id_cliente";
			$saldo = mysql_query($sql);

			if ($saldo - $valor < 0){
				echo "Impossível retirar essa quantia.";
				exit;
			} else {
				$valor = $saldo - $valor;
				$sql = "INSERT INTO bc_retirada_deposito (valor, id_cliente, data_hora, tipo_mov) VALUES ('$valor', $id_cliente, CURRENT_TIMESTAMP, '$tipo_mov')";
				$resultado = mysql_query($sql);
				$sql = "UPDATE bc_clientes SET saldo='$valor' WHERE id = $id_cliente";
				$resultado = mysql_query($sql);

				$dados = mysql_fetch_assoc(mysql_query("SELECT * FROM bc_retirada_deposito ORDER BY id DESC LIMIT 1"));
				$texto = $dados['valor']." - ".$dados['id_cliente']." - ".$dados['data_hora']." - ".$dados['tipo_mov'];
				
				$nome_arquivo = rand(0 , 99999999);
				$nome_arquivo = "recibo_de_retirada_".$nome_arquivo.".txt";
				$recibo = fopen($nome_arquivo, "a");
				$grava = fwrite($recibo, $texto);
				fclose($recibo);
				
			}
		} else {
			$sql = "SELECT saldo FROM bc_clientes WHERE id = $id_cliente";
			$saldo = mysql_query($sql);

			$valor = $valor + $saldo;
			$sql = "INSERT INTO bc_retirada_deposito (valor, id_cliente, data_hora, tipo_mov) VALUES ('$valor', $id_cliente, CURRENT_TIMESTAMP, '$tipo_mov')";
			$resultado = mysql_query($sql);
			$sql = "UPDATE bc_clientes SET saldo='$valor' WHERE id = $id_cliente";
			$resultado = mysql_query($sql);

			$dados = mysql_fetch_assoc(mysql_query("SELECT * FROM bc_retirada_deposito ORDER BY id DESC LIMIT 1"));
			$texto = $dados['valor']." - ".$dados['id_cliente']." - ".$dados['data_hora']." - ".$dados['tipo_mov'];
			$nome_arquivo = rand(0 , 99999999);
			$nome_arquivo = "recibo_de_deposito_".$nome_arquivo.".txt";
			$recibo = fopen($nome_arquivo, "a");
			$grava = fwrite($recibo, $texto);
			fclose($recibo);
		}
		header('location: /bancocentral/index.php?pagina=retirada-deposito');
	} 
?>

<div style="margin-top: 65px;">
	<form action="" method="post">
		<div class="row margin-align">
			<input type="hidden" name="id" value="<?=$id?>">
			<div class="form-group col-xs-12 col-md-3">
				<label>Tipo de Movimentação</label><br>
				<select class="form-control width-max" name="tipo_mov" id="movimentacao" required>
				    <option value="deposito">Deposito</option>
				    <option value="retirada">Retirada</option>
				  </select>
			</div>
			<div class="form-group col-xs-12 col-md-3">
				<label>Cliente</label><br>
				<select class="form-control width-max" name="id_cliente"  id="cliente" required>
				<?php $sql = "SELECT * FROM bc_clientes ORDER BY nome";
					$resultado = mysql_query($sql);
					while ($clientes = mysql_fetch_assoc($resultado)) { ?>
					<option value="<?php echo $clientes['id']?>"><?php echo $clientes['nome']." - ".$clientes['rg']." - ".$clientes['conta']." - ".$clientes['id_agencia'] ?></option>
				<?php } ?>
				</select>
			</div>
			<div class="form-group col-xs-12 col-md-6">
				<label>Valor</label><br>
				<input type="text" name="valor" value="<?=$valor?>" maxlength="18" onkeyup="somenteNumeros(this);" class="width-max" required>
			</div>	
			<div class="form-group col-xs-12 col-md-12">	
				<button class="btn btn-success" name="enviar" type="submit">Salvar e Gerar Recibo</button>
				<a href="index.php?pagina=listar-agencia" class="btn btn-danger my-2 my-sm-0">Sair</a>
			</div>
		</div>
	</form>
</div>