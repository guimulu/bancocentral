<?php
	include './php/connect_bd.php';
?>
<div style="margin-top: 65px;">
<div class="row">
	<div class="form-control col-xs-12">
		<h3>Cadastro de Agencias</h3>
	</div>
	<div class="col-xs-12" >
		<a href="index.php?pagina=cadastro-agencia">Novo</a>		
	</div>
</div>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Nº Agencia</th>
			<th>Banco</th>
			<th>Endereço</th>
			<th>Cidade</th>
			<th>UF</th>
			<th>CEP</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $sql = "SELECT * FROM bc_agencia";
			$resultado = mysql_query($sql);
			$agencias = mysql_fetch_row($resultado);
			if (isset($agencias['nome'])) {
			foreach ($agencias as $agencia) { ?>
			<tr>
				<td><?= $agencia['nome'] ?></td>
				<td><?= $agencia['nr_agencia'] ?></td>
				<td><?= $agencia['id_banco'] ?></td>
				<td><?= $agencia['endereco'] ?></td>
				<td><?= $agencia['cidade'] ?></td>
				<td><?= $agencia['uf'] ?></td>
				<td><?= $agencia['cep'] ?></td>
				<td>
					<a href="index.php?pagina=cadastro-agencia&id=<?=$agencia['id']?>">Editar</a>
					<a href="php/deletar.php?tabela=agencias&id=<?=$agencia['id']?>&voltar=listar-agencia">Deletar</a>
				</td>
			</tr>
		<?php }} ?>
	</tbody>
</table>
</div>
