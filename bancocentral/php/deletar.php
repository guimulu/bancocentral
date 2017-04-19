<?php

include './connect_bd.php';

mysql_query("DELETE FROM {$_GET['tabela']} FROM ID = {$_GET['id']}");

header("index.php?pagina={$_GET['voltar']}&mensagem=Registro Excluido com Sucesso");
