<?php
    // si les champs ne sont pas vides
    if(!empty($_POST['name'])&& !empty($_POST['email']) && !empty($_POST['service']) && !empty($_POST['message'])){
        // déclaration de variables contenant la valeur des champs
        $name = trim($_POST['name']); // trim() pour supprimer les espaces en début et fin de chaîne
        $email = trim($_POST['email']);
        $service = $_POST['service'];
        $message = strip_tags(trim($_POST['message'])); // strip_tags supprime les balises html et php d'une chaîne

        // déclaration de variables qui vont contenir les éléments du mail
        $to; // destinataire du mail
        $subject; // objet du mail
        $headers =  "From: $email" . "\r\n" . // en-têtes supplémentaires
                    "Reply-To: $email" . "\r\n" .
                    "X-Mailer: PHP/" . phpversion(); 

        // switch qui vérifie la valeur de $service et change la valeur de $to et $subject en conséquence
        switch($service){
            case 'pij':
                $to = '2022kirby@gmail.com';
                $subject = $name . ' - Demande d\'informations PIJ';
                break;
            case 'sefi':
                $to = '';
                $subject = $name . ' - Demande d\'informations SEFI';
                break;
            case 'accueilMineurs':
                $to = '';
                $subject = $name . ' - Demande d\'informations Accueil Mineurs';
                break;
            case 'fablab':
                $to = '';
                $subject = $name . ' - Demande d\'informations FabLab';
                break;
            case 'coworking':
                $to = '';
                $subject = $name . ' - Demande d\'informations Salle Coworking';
                break;
        }
        
        // si envoi du mail est true
        if(mail($to, $subject, $message, $headers)){
            // message de confirmation à l'utilisateur
            echo '<script type="text/javascript">alert("Message envoyé");</script>';
            header("Refresh:0"); // refresh de la page pour empêcher un renvoi de formulaire
        } else{ // si false
            // message d'erreur
            echo '<script type="text/javascript">alert("Echec de l\'envoi");</script>';
        }
    }
?>