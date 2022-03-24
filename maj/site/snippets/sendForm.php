<?php
    // si les champs ne sont pas vides
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['service']) && !empty($_POST['message'])) {
        // déclaration de variables contenant la valeur des champs
        $nameUser = strip_tags(trim($_POST['name'])); // strip_tags() pour supprimer les balises html et php d'une chaîne
        $emailUser = strip_tags(trim($_POST['email'])); // trim() pour supprimer les espaces en début et fin de chaîne
        $service = $_POST['service'];
        $message = strip_tags(trim(wordwrap($_POST['message'], 70, "\r\n"))); // wordwrap() dans le cas où les lignes du message comportent plus de 70 caractères (pour satisfaire les conventions php propres à l'envoi de mail)

        // déclaration de variables contenant les adresses mails des différents services (via récupération des champs de la page contact)
        $emailMaj = $pages->find('contact')->maj();
        $emailAccueilJeunes = $pages->find('contact')->accueilJeunes();
        $emailPij = $pages->find('contact')->pij();
        $emailSefi = $pages->find('contact')->sefi();
        $emailFablab = $pages->find('contact')->fablab();
        $emailDev = $pages->find('contact')->dev();

        // déclaration de variables qui vont contenir les éléments du mail
        $to; // destinataire du mail
        $subject; // objet du mail
        // en-têtes supplémentaires
        $headers =  "From: $emailUser" . "\r\n" . // expéditeur
                    "Reply-To: $emailUser" . "\r\n" . // répondre à
                    "Bcc: $emailDev" . "\r\n" . // copie carbone invisible
                    "X-Mailer: PHP/" . phpversion();
        
        try {
            // switch qui vérifie la valeur de $service et change la valeur de $to et $subject en conséquence
            switch($service) {
                case '':
                    break;
                case 'accueilJeunes':
                    $to = $emailAccueilJeunes;
                    $subject = $nameUser . ' - Demande d\'informations Accueil Jeunes';
                    break;
                case 'pij':
                    $to = $emailPij;
                    $subject = $nameUser . ' - Demande d\'informations PIJ';
                    break;
                case 'maisonDigitale':
                    $to = $emailMaj;
                    $subject = $nameUser . ' - Demande d\'informations Maison Digitale';
                    break;
                case 'sefi':
                    $to = $emailSefi;
                    $subject = $nameUser . ' - Demande d\'informations SEFI';
                    break;
                case 'fablab':
                    $to = $emailFablab;
                    $subject = $nameUser . ' - Demande d\'informations FabLab';
                    break;
                case 'coworking':
                    $to = $emailFablab;
                    $subject = $nameUser . ' - Demande d\'informations Salle Coworking';
                    break;
                case 'partenaires':
                    $to = $emailMaj;
                    $subject = $nameUser . ' - Demande d\'informations Permanence partenaires';
                    break;
                case 'autre':
                    $to = $emailMaj;
                    $subject = $nameUser . ' - Demande d\'informations MAJ';
                    break;
            }

            // si envoi du mail est true
            if(mail($to, $subject, $message, $headers)) {
                // on envoie une copie du message à l'utilisateur
                $messageCopy = "Votre demande à MAJ a bien été reçue, nous vous répondrons dans les plus brefs délais.\r\n \r\nVotre message:\r\n$message\r\n \r\nMerci de ne pas répondre à ce mail.";
                mail($emailUser, $subject, $messageCopy, 'From: ' . $emailMaj);

                // puis redirection du navigateur vers page de confirmation
                header('Location: ' . $pages->find('contact/confirmation')->url()); 
                // s'assurer que la suite du code n'est pas exécutée une fois la redirection effectuée
                exit; 
            } else { // si envoi du mail est false
                // redirection du navigateur vers page d'erreur
                header('Location: ' . $pages->find('contact/echec')->url()); 
                // s'assurer que la suite du code n'est pas exécutée une fois la redirection effectuée
                exit; 
            }
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
?>