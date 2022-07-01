<?php 

	$q = $db->prepare("SELECT * from task WHERE proprietaire = :id ORDER BY date");
    $q->execute(['id' => $id_user]);


    $i = 1;
    while ($i <= 10) {
        $i++;

        $result = $q->fetch();

        if(isset($result["titre"])){
            echo "<div class='task1'><a href='tache.php?id=" . $result["id"] . "&formsend=Submit+Query'><h2>" . $result["titre"] . "</h2></a><p>" . $result["description"] . "</p><p>à faire pour le " . $result["date"] . "</p><div id='barre'></div></div>";
        }
    }
    

?>
