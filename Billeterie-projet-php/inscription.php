<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=authentification;charset=utf8;', 'root', 'root');
if(isset($_POST['Connexion'])){
	if(!empty($_POST['identifiant']) AND !empty($_POST['motdepasse'])){
		$identifiant = htmlspecialchars($_POST['identifiant']);
		$motdepasse = htmlspecialchars($_POST['motdepasse']);
		$insertUser = $bdd->prepare('INSERT INTO utilisateurs(identifiant, motdepasse) VALUES (? ,?)');
		$insertUser->execute(array($identifiant, $motdepasse));

		echo "Vous vous êtes bien inscris.";

	}else{
		echo "Veuillez compléter tous les champs ..";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Inscription</title>
</head>
<body>
	<div class="inscri">
		<a id="home" href="index.php">Home</a>
		<a id="connexion" href="connexion.php">Connexion</a>
	</div>

	<form method="POST" action="">
		
			<input id="Ident" type="text" name="identifiant" autocomplete="off">
			<br>
			
			<input id="mdp" type="password" name="motdepasse" autocomplete="off">
			<br>

			<input id="valider" type="submit" name="Connexion">

	</form>

</body>
</html>