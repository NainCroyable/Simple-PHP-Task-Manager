<?php

    ini_set("SMTP","localhost");
    ini_set("smtp_port","25");

    $dest="simdererste@gmail.com";
    $objet="Rendez-vous";
    $message="
        <font face='arial'>
        Bonjourn
        Prière de se retrouver sur Skype à <b>18h</b> aujourd'hui.n
        Merci et bonne journée.
        </font>
    ";
    $entetes="From: thenaincroyable@mailo.com";
    $entetes.="Content-Type: text/html; charset=iso-8859-1";
   
    if(mail($dest,$objet,$message,$entetes))
        echo "Mail envoyé avec succès.";
    else
        echo "Un problème est survenu.";
    exit;
?> 