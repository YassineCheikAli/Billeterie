<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=authentification;charset=utf8;', 'root', 'root');
if(isset($_POST['Connexion'])){
	if(!empty($_POST['identifiant']) AND !empty($_POST['motdepasse'])){
		$identifiant = htmlspecialchars($_POST['identifiant']);
		$motdepasse = htmlspecialchars($_POST['motdepasse']);
		$recupUser = $bdd->prepare('SELECT * FROM utilisateurs WHERE identifiant = ? AND motdepasse = ? ');
		$recupUser->execute(array($identifiant, $motdepasse));

		if($recupUser->rowCount() > 0){
			$_SESSION['identifiant'] = $identifiant;
			$_SESSION['motdepasse'] = $motdepasse;
			$_SESSION['id'] = $recupUser->fetch()['id'];
			echo $_SESSION['identifiant'];
			
		}else{
			echo "Votre mot de passe est invalide";
		}

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
	<title>Connexion</title>
</head>
<body>
	<div class="conne">
		<a id="home" href="index.php">Home</a>
		<a id="inscription" href="inscription.php">Insciption</a>
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