    <?php

        if(isset($_POST['formsend'])){

            extract ($_POST); # extrait les infos de $_POST

            # verifier que les champs ne sont pas vides
            if(!empty($password) && !empty($cpassword) && !empty($pseudo)){

                if($cpassword == $password){
                    $options = [
                        'cost' => 9
                    ];
                    $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);


                    $c = $db->prepare("SELECT pseudo FROM profil WHERE pseudo = :pseudo");
                    $c->execute([
                        'pseudo' => $pseudo
                    ]);
                    $result = $c->rowCount();


                    if($result == 0){

                        $q = $db->prepare("INSERT INTO profil(pseudo, mdp) VALUES(:pseudo, :password)");
                        $q->execute([
                            'pseudo'=> $pseudo,
                            'password'=> $hashpass
                        ]);
                        echo "Le compte à ".$pseudo." a été crée";

                        $c = $db->prepare("SELECT * FROM profil WHERE pseudo = :pseudo");
                        $c->execute([
                            'pseudo' => $pseudo
                        ]);
                        $result = $c->fetch();

                        $_SESSION['pseudo'] = $pseudo;
                        $_SESSION['id'] = $result["id"];


                    } else {
                        echo "Ce pseudo est déja utilisé";
                    }
                } else {
                    echo "les 2 mots de passes sont différents.";
                }

            } else {
                echo "tous les champs ne sont pas remplis.";
            }
        } 
    ?>