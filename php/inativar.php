<?php

include './connect_bd.php';
$sql = "UPDATE 'bc_clientes' SET 'ativo'=0 WHERE ID = {$_GET['id']}"
mysql_query($sql);

header("location: /bancocentral/index.php?pagina={$_GET['voltar']}&mensagem=Registro Excluido com Sucesso");