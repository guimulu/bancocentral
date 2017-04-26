<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Banco Central</title>
	<link href="res/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <script src="res/jquery/jquery.min.js"></script>
    <script src="res/tether/tether.min.js"></script>
    <script src="res/bootstrap/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
</head>
<body>

	<?php //echo $_GET['mensagem'] ?>

	<?php 
		if (! isset($_SESSION['usuario'])) { 
			include_once './partials/login-form.php';
		} else {
			include_once './partials/menu.php';

			if (isset($_GET['pagina'])) {
				include_once './partials/' . $_GET['pagina'] . '.php';
			}
		}
	?>
</body>
</html>