<?php
	include './php/connect_bd.php';
?>
<div style="margin-top: 65px;">
<div class="row">
	<div class="form-group form-control col-xs-12">
		<h3 style="margin-left: 30px">Cadastro de Agências
			<a class="btn btn-success" href="index.php?pagina=cadastro-agencia" style="float: right; margin-right: 20px">Novo</a>
		</h3>	
	</div>
</div>
<table class="table table-bordered table-hover">
	<thead class="thead-inverse">
		<tr>
			<th>Nome</th>
			<th>Nº Agencia</th>
			<th>Banco</th>
			<th>Endereço</th>
			<th>Cidade</th>
			<th>UF</th>
			<th>CEP</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php $sql = "SELECT * FROM bc_agencias";
			$resultado = mysql_query($sql);
			while ($agencias = mysql_fetch_assoc($resultado)) { ?>
			<tr>
				<td><?php echo $agencias['nome'] ?></td>
				<td><?php echo $agencias['nr_agencia'] ?></td>
				<td><?php echo $agencias['id_banco'] ?></td>
				<td><?php echo $agencias['endereco'] ?></td>
				<td><?php echo $agencias['cidade'] ?></td>
				<td><?php echo $agencias['id_uf'] ?></td>
				<td><?php echo $agencias['cep'] ?></td>
				<td>
					<a class="btn btn-warning" href="index.php?pagina=cadastro-agencia&id=<?=$agencias['id']?>" title="Editar"><img src="./img/edit.svg"></a>
					<a class="btn btn-danger" href="php/deletar.php?tabela=bc_agencias&id=<?=$agencias['id']?>&voltar=listar-agencia" title="Excluir"><img src="./img/trash.svg"></a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
</div>
