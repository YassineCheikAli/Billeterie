<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=billetterie;charset=utf8;', 'root', 'root');
if(isset($_POST['Event'])){
	if(!empty($_POST['nom']) AND !empty($_POST['date_debut']) AND !empty($_POST['date_fin']) AND !empty($_POST['adresse']) AND !empty($_POST['description'])){
		$nom = htmlspecialchars($_POST['nom']);
        $datedebut = htmlspecialchars($_POST['date_debut']);
		$datefin = htmlspecialchars($_POST['date_fin']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $descrip = htmlspecialchars($_POST['description']);
		$insertEvent = $bdd->prepare('INSERT INTO evenements(nom, date_debut, date_fin, adresse, description) VALUES (? ,?, ?, ?, ?)');
		$insertEvent->execute(array($nom, $datedebut, $datefin, $adresse, $descrip));

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
	<title>Billeterie</title>
</head>
<body>
	<div class="inscri">
		<a id="home" href="index.php">Home</a>
		<a id="connexion" href="connexion.php">Connexion</a>
	</div>

	<form method="POST" action="">
		
			<input id="Ident" type="text" name="nom" autocomplete="off" placeholder="nom">
			<br>
			
			<input id="mdp" type="date" name="date_debut" autocomplete="off" placeholder="debut">
			<br>

			<input id="mdp" type="date" name="date_fin" autocomplete="off" placeholder="fin">
			<br>

			<input id="mdp" type="text" name="adresse" autocomplete="off" placeholder="adresse">
			<br>

			<input id="mdp" type="text" name="description" autocomplete="off" placeholder="description">
			<br>

			<input id="valider" type="submit" name="Event" value="Créer">
			<br>
			<br>
			
			<a href="liste_event.php"><button type="button">Afficher</button></a>
			<br>
			<br>
	</form>


</body>
</html>