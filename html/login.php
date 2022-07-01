<?php 
    session_start();

    include 'includes/database.php';
    global $db;

    $id_user = $_SESSION['id'];
    $pseudo = $_SESSION['pseudo'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Se connecter ou S'inscrire - Task Manager</title>
    <link rel="stylesheet" href="css/style-nav-bar.css">
    <link rel="shortcut icon" href="img/to-do-list-icon.png" type="image/x-icon">
</head>
<body>

    <?php include 'includes/nav-bar.php'; ?>

    <h1>Se Connecter</h1>
    <form method="post">
        <input type="lpseudo" name="lpseudo" id="lpseudo" placeholder="Votre pseudo" required><br/>
        <input type="text" name="lpassword" id="lpassword" placeholder="Votre mot de passe" required><br/>
        <input type="submit" name="lformlogin" id="lformlogin" value="se connecter"><br/>
    </form>

    <?php include 'includes/login.php'; ?>

    <h1>S'inscrire</h1>
    <form method="post">
        <input type="pseudo" name="pseudo" id="email" placeholder="Votre pseudo" required><br/>
        <input type="text" name="password" id="password" placeholder="Votre mot de passe" required><br/>
        <input type="text" name="cpassword" id="cpassword" placeholder="Confirmez votre mot de passe" required><br/>
        <input type="submit" name="formsend" id="formsend" value="s'inscrire"><br/>
    </form>

    <?php include 'includes/signin.php'; ?>

</body>
</html>