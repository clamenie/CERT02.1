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
	<form class="" action="#" method="post">
		<label for="email">E-mail :</label>
		<input type="email" name="email" value="">
		<label for="password">Password :</label>
		<input type="password" name="password" value="">
		<button type="submit" name="button">Login</button>
	</form>
</body>
</html>