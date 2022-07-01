<?php session_start();

    include 'includes/database.php';
    global $db;


    $id_user = $_SESSION['id'];
    $pseudo = $_SESSION['pseudo'];


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vos tâches - Task Manager</title>
    <link rel="stylesheet" href="css/style-nav-bar.css">
    <link rel="stylesheet" href="css/liste-tache.css">
    <link rel="shortcut icon" href="img/to-do-list-icon.png" type="image/x-icon">
    <?php include 'includes/verifier-si-connecte.php'; ?>
</head>
<body>

    <?php include 'includes/nav-bar.php'; ?>

    <?php 
        if(isset($_GET['formsend'])){
            extract ($_GET); # extrait les infos de $_GET
        }

        $q = $db->prepare("SELECT * from task WHERE id = :id");
        $q->execute(['id' => $id]);
        $result = $q->fetch();

        if(isset($result["titre"])){
                echo "<div class='task1'><a href='tache.php?id=" . $result["id"] . "&formsend=Submit+Query'><h2>" . $result["titre"] . "</h2></a><p>" . $result["description"] . "</p><p>" . $result["date-creation"] . "</p><div id='barre'></div></div>";
        } else {
            echo "cette tache n'existe pas";
        }
    ?>


    <?php
        $q = $db->prepare("SELECT * from commentaire WHERE proprietaire = :id");
        $q->execute(['id' => $id]);
        $result = $q->fetch();

        $i = 1;
        while (isset($result["content"])) {
            $i++;
            echo "<p id='comment'>" . $result["content"] . "</p><div id='barre'></div>";
            $result = $q->fetch();
        }
    ?>


    <br/><a href="delete-task.php?id=<?= $id ?>&formsend=Submit+Query">supprimer cette tâche</a>


    <h2>mettre un commentaire :</h2>
    <form method="post">
        <input type="text" name="commentaire" id="commentaire" placeholder="Votre Commentaire" required><br/>
        <input type="submit" name="formsend" id="formsend"><br/>
    </form>

    <?php

        if(isset($_POST['formsend'])){
            extract ($_POST); # extrait les infos de $_POST

            # verifier que les champs ne sont pas vides
            if(!empty($commentaire)){

                $q = $db->prepare("INSERT INTO commentaire(content, proprietaire) VALUES(:content, :proprio)");
                $q->execute([
                    'content' => $commentaire,
                    'proprio' => $id
                ]);
            }
        }
    ?>

</body>
</html>