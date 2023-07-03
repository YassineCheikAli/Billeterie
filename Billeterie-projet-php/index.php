<?php
session_start();
if(!$_SESSION['motdepasse']){
	header('Location: connexion.php');
}

echo $_SESSION['identifiant'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Index</title>
</head>
<body>
	<div class="authen">
		<a href="connexion.php">Connexion</a>
		<a href="inscription.php">Insciption</a>
		<a href="billeterie.php">Billeterie</a>
		<a href="deconnexion.php">Déconnexion</a>
	</div>
</body>
</html>