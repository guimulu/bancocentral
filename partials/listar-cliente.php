<?php
	include './php/connect_bd.php';
?>
<div style="margin-top: 65px;">
<div class="row">
	<div class="form-group form-control col-xs-12">
		<h3 style="margin-left: 30px">Cadastro de Clientes
			<a class="btn btn-success" href="index.php?pagina=cadastro-cliente" style="float: right; margin-right: 20px">Novo</a>
		</h3>	
	</div>
</div>
<table class="table table-bordered table-hover">
	<thead class="thead-inverse">
		<tr>
			<th>Nome</th>
			<th>CPF</th>
			<th>RG</th>
			<th>Telefone</th>
			<th>Agencia</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php $sql = "SELECT * FROM bc_clientes";
			$resultado = mysql_query($sql);
			while ($agencias = mysql_fetch_assoc($resultado)) { 
				if ($clientes['ativo'] == 0) continue; else {?>
			<tr>
				<td><?php echo $agencias['nome'] ?></td>
				<td><?php echo $agencias['cpf'] ?></td>
				<td><?php echo $agencias['rg'] ?></td>
				<td><?php echo $agencias['telefone'] ?></td>
				<td><?php echo $agencias['agencia'] ?></td>
				<td>
					<a class="btn btn-warning" href="index.php?pagina=cadastro-cliente&id=<?=$clientes['id']?>" title="Ediatr"><img src="./img/edit.svg"></a>
					<a class="btn btn-danger" href="php/inativar.php?tabela=bc_clientes&id=<?=$clientes['id']?>&voltar=listar-clientes" title="Excluir"><img src="./img/trash.svg"></a>
				</td>
			</tr>
		<?php } } ?>
	</tbody>
</table>
</div>
