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
    <title>Votre Profil - Task Manager</title>
    <link rel="stylesheet" href="css/style-nav-bar.css">
    <link rel="stylesheet" href="css/liste-tache.css">
    <link rel="shortcut icon" href="img/to-do-list-icon.png" type="image/x-icon">
    <?php include 'includes/verifier-si-connecte.php'; ?>
</head>
<body>

    <?php include 'includes/nav-bar.php'; ?>

    <?php 
        $q = $db->prepare("SELECT * from profil WHERE id = :id");
        $q->execute(['id' => $id_user]);
        $result = $q->fetch();
    ?>

    <h1>Votre Profil :</h1>
    <p>pseudo : <?= $result['pseudo'] ?></p>
    <p>date de création du compte : <?= $result['date-creation'] ?></p>
    <a href="delete-user.php">supprimer ce compte</a><a> / </a>
    <a href="deconnecter.php">se déconnecter</a>

</body>
</html>