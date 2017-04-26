<?php
	include './php/connect_bd.php';
?>
<div style="margin-top: 65px;">
<div class="row">
	<div class="form-group form-control col-xs-12">
		<h3 style="margin-left: 30px">Cadastro de Bancos
			<a class="btn btn-success" href="index.php?pagina=cadastro-banco" style="float: right; margin-right: 20px">Novo</a>
		</h3>	
	</div>
</div>
<table class="table table-bordered table-hover">
	<thead class="thead-inverse">
		<tr>
			<th style="width: 10%">Código</th>
			<th style="width: 45%">Nome</th>
			<th style="width: 20%">CNPJ</th>
			<th style="width: 20%">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php $sql = "SELECT * FROM bc_bancos";
			$resultado = mysql_query($sql);
			//$bancos = mysql_fetch_row($resultado);
			//var_dump();
			while ($bancos = mysql_fetch_assoc($resultado)) { ?>
			<tr>
				<td><?php echo  $bancos['codigo'] ?></td>
				<td><?php echo $bancos['nome'] ?></td>
				<td><?php echo $bancos['cnpj'] ?></td>
				<td>
					<a class="btn btn-warning" href="index.php?pagina=cadastro-banco&id=<?=$bancos['id']?>" title="Editar"><img src="./img/edit.svg"></a>
					<a class="btn btn-danger" href="php/deletar.php?tabela=bc_bancos&id=<?=$bancos['id']?>&voltar=listar-banco" title="Excluir"><img src="./img/trash.svg"></a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
</div>
