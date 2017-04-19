<?php
$link = mysql_connect('127.0.0.1', 'root', '');
if (!$link) {
    die('Erro ao conectar ao banco: ' . mysql_error());
}

mysql_select_db('banco_central', $link);

//echo 'Conectado com sucesso';
//mysql_close($link);
?>