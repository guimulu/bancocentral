<?php

include './connect_bd.php';

$sql = "DELETE FROM {$_GET['tabela']} WHERE ID = {$_GET['id']}";

mysql_query($sql);

header("location: /bancocentral/index.php?pagina={$_GET['voltar']}&mensagem=Registro Excluido com Sucesso");