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

	if(isset($_GET['formsend'])){
        extract ($_GET); # extrait les infos de $_GET

        $q = $db->prepare("DELETE FROM `task` WHERE id=:id AND proprietaire=:proprio");
        $q->execute([
            'id' => $id,
            'proprio' => $id_user
        ]);
    }


?>