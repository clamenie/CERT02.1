<?php
	session_start();
	include 'src/dao/DBController.php';
?>
<html>
<head>
	<title></title>
</head>
<body>


<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			print_r($_POST);
			$dbController = new DAO\DBController();
			$connected = $dbController->login($_POST['email'], $_POST['password']);
			if($connected) print('connected');
			else print('NOOOO');

			$dconnected = $dbController->logout($_POST['email']);
			if($dconnected) print('disconnected');
			else print('NOOOO');

		}
?>
	<form class="" action="#" method="post">
		<label for="email">E-mail :</label>
		<input type="email" name="email" value="">
		<label for="password">Password :</label>
		<input type="password" name="password" value="">
		<button type="submit" name="button">Login</button>
	</form>
</body>
</html>
