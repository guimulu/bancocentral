<?php
	include './php/connect_bd.php';
?>
<div style="margin-top: 65px;">
	<div class="row">
		<div class="form-group form-control col-xs-12">
			<h3 style="margin-left: 30px">Listar Saldo</h3>	
		</div>
	</div>
	<table class="table table-bordered table-hover">
		<thead class="thead-inverse">
			<tr>
				<th>Banco</th>
				<th>Agencia</th>
				<th>Conta</th>
				<th>Cliente</th>
				<th>Tipo da Conta</th>
				<th>Saldo</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$sql = "SELECT * FROM bc_clientes AS c INNER JOIN bc_agencias AS a ON c.'id_agencia' = a.'id' WHERE ativo = 1 ORDER BY c.`id` ASC";
				//$sql = "SELECT * FROM bc_clientes where ativo = 1";
				$resultado = mysql_query($sql);
				var_dump($resultado);
				exit;
				while ($clientes = mysql_fetch_assoc($resultado)) { ?>
				<tr>
					<td><?php echo $clientes['id_banco'] ?></td>
					<td><?php echo $clientes['id_agencia'] ?></td>
					<td><?php echo $clientes['conta'] ?></td>
					<td><?php echo $clientes['nome'] ?></td>
					<td>Corrente</td>
					<td><?php echo $clientes['saldo'] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
