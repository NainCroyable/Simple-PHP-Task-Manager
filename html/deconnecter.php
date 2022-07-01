<?php

    session_start();

    $_SESSION = array();
    session_destroy();
?>

<html>
<head>
<meta http-equiv="refresh" content="0; url=login.php" />
</head>
<body>
    <p>Redirection vers la page de connexion en cours ...</p>
</body>
</html>
