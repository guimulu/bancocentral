<?php

include './connect_bd.php';

$sql = "UPDATE {$_GET['tabela']} SET ativo = 0 WHERE {$_GET['tabela']}.id = {$_GET['id']}";

mysql_query($sql);

header("location: /bancocentral/index.php?pagina={$_GET['voltar']}&mensagem=Registro Excluido com Sucesso");