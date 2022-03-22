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
        
        try{
            // switch qui vérifie la valeur de $service et change la valeur de $to et $subject en conséquence
            switch($service){
                case '':
                    $to = '';
                    $subject = '';
                    break;
                case 'accueilJeunes':
                    $to = $pages->find('contact')->accueilJeunes();
                    $subject = $name . ' - Demande d\'informations Accueil Jeunes';
                    break;
                case 'pij':
                    $to = '2022kirby@gmail.com';
                    $subject = $name . ' - Demande d\'informations PIJ';
                    break;
                case 'maisonDigitale':
                    $to = '';
                    $subject = $name . ' - Demande d\'informations Maison Digitale';
                    break;
                case 'sefi':
                    $to = '';
                    $subject = $name . ' - Demande d\'informations SEFI';
                    break;
                case 'fablab':
                    $to = '';
                    $subject = $name . ' - Demande d\'informations FabLab';
                    break;
                case 'coworking':
                    $to = '';
                    $subject = $name . ' - Demande d\'informations Salle Coworking';
                    break;
                case 'partenaires':
                    $to = '';
                    $subject = $name . ' - Demande d\'informations Permanence partenaires';
                    break;
            }

            // si envoi du mail est true
            if(mail($to, $subject, $message, $headers)){
                header('Location: http://devkirby.e-maj.org/contact/succes'); // redirection du navigateur vers page de confirmation
                exit; // s'assurer que la suite du code n'est' pas exécutée une fois la redirection effectuée
            } else{ // si false
                header('Location: http://devkirby.e-maj.org/contact/echec'); // redirection du navigateur vers page d'erreur
                exit; // s'assurer que la suite du code n'est' pas exécutée une fois la redirection effectuée
            }
        } catch (Exception $e){
            echo 'Erreur: ' . $e->getMessage();
        }
    }
?>