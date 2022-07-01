    <?php


        if(isset($_POST['lformlogin'])) {

            extract($_POST);

            if(!empty($lpseudo) && !empty($lpassword)) {

                $q = $db->prepare("SELECT * from profil WHERE pseudo = :pseudo");
                $q->execute(['pseudo' => $lpseudo]);
                $result = $q->fetch();

                if($result == true) {

                    //le compte existe bien
                    if(password_verify($lpassword, $result['mdp'])) {
                        echo "le mot de passe est correct";

                        $_SESSION['pseudo'] = $result["pseudo"];
                        $_SESSION['id'] = $result["id"];

                    } else {
                        echo "le mot de passe est incorrect";
                    }

                } else {
                    echo "Le compte portant le pseudo " . $lpseudo . " n'existe pas";
                }


            } else {
                echo "Veuillez compléter l'ensemble des champs.";
            }
        }
    ?>
        
    