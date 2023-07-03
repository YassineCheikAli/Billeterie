<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=billetterie;charset=utf8;', 'root', 'root');

	$afficher_event = $bdd->prepare("SELECT * FROM evenements");
	$afficher_event->execute();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Modification</title>
</head>
<body>
	<div class="inscri">
		<a id="home" href="index.php">Home</a>
		<a id="connexion" href="connexion.php">Connexion</a>
	</div>

	<div class="liste_evenement">
		<?php
			foreach($afficher_event as $ae){
			?>
				<div class="event_name">
					<div>
						<?= $ae['nom'] ?>
					</div>
					<div class="evenement_btn">
						<a href="edit_event.php" class="liste_btn_modifier" >Modifier</a>
						<input class="liste_btn_supprimer" type="submit" name="Delete" value="Supprimer">
					</div>
				</div>
		<?php	
			}
		?>		
	</div>	
	

</body>
</html>