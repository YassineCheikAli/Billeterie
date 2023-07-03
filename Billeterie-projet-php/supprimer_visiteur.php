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
                        <a href="edit_event.php?id=<?= $ae['id'] ?>" class="liste_btn_modifier" >Modifier</a>
                        <form method="post" action="delete_event.php">
                            <input type="hidden" name="id" value="<?= $ae['id'] ?>">
                            <input class="liste_btn_supprimer" type="submit" name="Delete" value="Supprimer">
                        </form>
                    </div>

                    <!-- Ajouter un visiteur -->
                    <form method="post" action="add_visitor.php">
                        <input type="hidden" name="event_id" value="<?= $ae['id'] ?>">
                        <label for="nom">Nom:</label>
                        <input type="text" name="nom" required><br>
                        <label for="prenom">Prénom:</label>
                        <input type="text" name="prenom" required><br>
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" required><br>
                        <input type="submit" value="Ajouter visiteur">
                    </form>

                    <!-- Liste des visiteurs -->
                    <?php
                        $afficher_visiteurs = $bdd->prepare("SELECT * FROM visiteurs WHERE event_id = ?");
                        $afficher_visiteurs->execute(array($ae['id']));
                        $visiteurs = $afficher_visiteurs->fetchAll();
                    ?>
                    <table>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>E-mail</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($visiteurs as $index => $visiteur) { ?>
                            <tr>
                                <td><?php echo ($index + 1); ?></td>
                                <td><?php echo $visiteur["nom"]; ?></td>
                                <td><?php echo $visiteur["prenom"]; ?></td>
                                <td><?php echo $visiteur["email"]; ?></td>
                                <td>
                                    <form method="post" action="delete_visitor.php">
                                        <input type="hidden" name="id" value="<?= $visiteur['id'] ?>">
                                        <input type="hidden" name="event_id" value="<?= $ae['id'] ?>">
                                        <input type="submit" name="Delete" value="Supprimer">
                                    </form>
                                </td>
                                </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>
    </div>
</body>
</html>
