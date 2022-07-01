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

    <?php include 'includes/obtenir-liste-tache.php'; ?>

</body>
</html>