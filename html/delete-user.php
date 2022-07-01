<?php session_start();

    include 'includes/database.php';
    global $db;


    $id_user = $_SESSION['id'];
    $pseudo = $_SESSION['pseudo'];


?>

<html>
<head>
<meta http-equiv="refresh" content="0; url=index.php" />
</head>
<body>
	<p>Redirection vers l'accueil en cours ...</p>
</body>
</html>

<?php
    $q = $db->prepare("DELETE FROM `profil` WHERE id=:id");
    $q->execute([
        'id' => $id_user
    ]);
    $_SESSION = array();
    session_destroy();
?>