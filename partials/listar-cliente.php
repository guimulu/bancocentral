<script type="text/javascript">
$(document).ready(function(){
	$('#filtro-cliente').change(function(){
		if ($( "#filtro-cliente" ).val() == 'cidades'){
			$('#div-cidades').css('display', 'block');
		} else{
			$('#div-cidades').css('display', 'none');
		}
	});
});
</script>

<?php
	include './php/connect_bd.php';
	$op_cidade = $_POST['filtro-cidades'];
?>
<div style="margin-top: 65px;">
<div class="row">
	<div class="form-group form-control col-xs-12">
		<h3 style="margin-left: 30px">Cadastro de Clientes
			<a class="btn btn-success" href="index.php?pagina=cadastro-cliente" style="float: right; margin-right: 20px">Novo</a>
		</h3>	
	</div>
</div>
<div id="div-filtros">
	<form action="" method="POST">
		<div class="row margin-align">
			<div class="form-group col-xs-12 col-sm-2 col-md-1">	
				<label>Filtros:</label>
			</div>
			<div class="form-group col-xs-12 col-sm-4">	
				<select class="form-control width-max" name="filtro-cliente" id="filtro-cliente" required>
				    <option value="clientes_ativos">Clientes Ativos</option>
				    <option value="clientes_inativos">Clientes Inativos</option>
				    <option value="cidades">Cidades</option>
				</select>
			</div>
			<div id="div-cidades" class="form-group col-xs-12 col-sm-4" style="display: none">	
				<select class="form-control width-max" name="filtro-cidades" id="cidades" >
				<?php $sql = "SELECT DISTINCT cidade FROM bc_clientes WHERE ativo = 1 ORDER BY cidade";
					$resultado = mysql_query($sql);
					while ($cidades = mysql_fetch_assoc($resultado)) { ?>
				    <option value="<?php echo $cidades['cidade'];?>"><?php echo $cidades['cidade'] ?></option>
				  <?php } ?>
				  </select>
			</div>
			<div class="form-group col-xs-12 col-sm-2">	
				<button class="btn btn-success" name="enviar" type="submit">Filtrar</button>
			</div>
		</div>
	</form>
</div>

<?php 
	$_POST['filtro-cliente'] = isset($_POST['filtro-cliente']) ? $_POST['filtro-cliente'] : null;
	if ($_POST['filtro-cliente']) {
		if ($_POST['filtro-cliente'] == 'clientes_ativos') { ?>
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
		<?php $sql = "SELECT * FROM bc_clientes WHERE ativo = 1";
			$resultado = mysql_query($sql);
			while ($clientes = mysql_fetch_assoc($resultado)) {?>
			<tr>
				<td><?php echo $clientes['nome'] ?></td>
				<td><?php echo $clientes['cpf'] ?></td>
				<td><?php echo $clientes['rg'] ?></td>
				<td><?php echo $clientes['telefone'] ?></td>
				<td><?php echo $clientes['id_agencia'] ?></td>
				<td>
					<a class="btn btn-warning" href="index.php?pagina=edita-endereco-cliente&id=<?=$clientes['id']?>" title="Editar Endereço"><img src="./img/edit.svg"></a>	
					<a class="btn btn-danger" href="php/inativar.php?tabela=bc_clientes&id=<?=$clientes['id']?>&voltar=listar-cliente" title="Excluir"><img src="./img/trash.svg"></a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
	<?php	} else if ($_POST['filtro-cliente'] == 'clientes_inativos') { ?>
		<table class="table table-bordered table-hover">
			<thead class="thead-inverse">
				<tr>
					<th>Nome</th>
					<th>CPF</th>
					<th>RG</th>
					<th>Endereço</th>
					<th>Cidade</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				<?php $sql = "SELECT * FROM bc_clientes WHERE ativo = 0";
					$resultado = mysql_query($sql);
					while ($clientes = mysql_fetch_assoc($resultado)) {?>
					<tr>
						<td><?php echo $clientes['nome'] ?></td>
						<td><?php echo $clientes['cpf'] ?></td>
						<td><?php echo $clientes['rg'] ?></td>
						<td><?php echo $clientes['rua'] ?></td>
						<td><?php echo $clientes['cidade'] ?></td>
						<td><?php echo $clientes['id_uf'] ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php	} else if ($_POST['filtro-cliente'] == 'cidades') { ?>
		<table class="table table-bordered table-hover">
			<thead class="thead-inverse">
				<tr>
					<th>Cidade</th>
					<th>Agência</th>
					<th>Nome</th>
					<th>RG</th>
					<th>Endereço</th>
				</tr>
			</thead>
			<tbody>
				<?php $sql = "SELECT  * FROM bc_clientes WHERE cidade = '$op_cidade' AND ativo = 1";
					$resultado = mysql_query($sql);
					while ($clientes = mysql_fetch_assoc($resultado)) {?>
					<tr>
						<td><?php echo $clientes['cidade'] ?></td>
						<td><?php echo $clientes['id_agencia'] ?></td>
						<td><?php echo $clientes['nome'] ?></td>
						<td><?php echo $clientes['rg'] ?></td>
						<td><?php echo $clientes['rua'] ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php	}
	} else { ?>
		<table class="table table-bordered table-hover">
			<thead class="thead-inverse">
				<tr>
					<th>Escolha um Filtro.</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	<?php } ?>
</div>
