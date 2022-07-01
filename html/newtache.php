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
    <title>Nouvelle tâche - Task Manager</title>
    <link rel="stylesheet" href="css/style-nav-bar.css">
    <link rel="shortcut icon" href="img/to-do-list-icon.png" type="image/x-icon">
    <?php include 'includes/verifier-si-connecte.php'; ?>
</head>
<body>

    <?php include 'includes/nav-bar.php'; ?>

    <form method="post">
        <input type="text" name="titre" id="titre" placeholder="Titre" required><br/>
        <input type="text" name="description" id="description" placeholder="Description" required><br/>
        <input type="date" name="date" id="date" placeholder="date" required><br/>
        <input type="submit" name="formsend" id="formsend" value="enregistrer"><br/>
    </form>

    <?php

        if(isset($_POST['formsend'])){
            extract ($_POST); # extrait les infos de $_POST

            # verifier que les champs ne sont pas vides
            if(!empty($titre) && !empty($description) && !empty($date)){
                echo "la tache a été enregistré";


                $q = $db->prepare("INSERT INTO `task`(`proprietaire`, `date`, `titre`, `description`) VALUES (:id, :date, :titre, :description)");
                $q->execute([
                    'id' => $id_user,
                    'date' => $date,
                    'titre' => $titre,
                    'description' => $description

            ]);
            }
        }
    ?>


</body>
</html>