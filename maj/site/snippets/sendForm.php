<?php
    // si les champs ne sont pas vides
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['service']) && !empty($_POST['message'])) {
        // déclaration de variables contenant la valeur des inputs de l'utilisateur
        // nettoyage de ces inputs avec:
            // strip_tags() pour supprimer les balises html et php d'une chaîne
            // trim() pour supprimer les espaces en début et fin de chaîne
            // wordwrap() dans le cas où les lignes du message comportent plus de 70 caractères (pour satisfaire les conventions php propres à l'envoi de mail)
        $nameUser = strip_tags(trim($_POST['name'])); 
        $emailUser = strip_tags(trim($_POST['email'])); 
        $nameService = $_POST['service'];
        $message = strip_tags(trim(wordwrap($_POST['message'], 70, "\r\n"))); 

        // déclaration de variables qui vont contenir les éléments du mail
        $to; // destinataire du mail
        $subject = $nameUser . ' - Demande d\'informations '; // objet du mail
        // en-têtes supplémentaires
        $headers =  'From: ' . $emailUser . "\r\n" . // expéditeur
                    'Reply-To: ' . $emailUser . "\r\n" . // répondre à
                    'Bcc: ' . $pages->find('contact')->dev() . "\r\n" . // copie carbone invisible
                    'X-Mailer: PHP/' . phpversion();

        try {
            // si le service sélectionné est autre
            if($nameService == "Autre"){
                // changement de la valeur de $to et $subject en conséquence
                $to = $pages->find('contact')->maj();
                $subject .= "MAJ";
            } else{ //sinon
                // pour chaque page enfant de services
                foreach($pages->find('services')->children()->listed() as $service){
                    // vérification de la valeur de $nameService et changement de la valeur de $to et $subject en conséquence
                    if($service->title() == $nameService){
                        $to = $service->mails();
                        $subject .= $service->title();
                    }
                }
            }
            
            // si envoi du mail est true
            if(mail($to, $subject, $message, $headers)) {
                // on envoie une copie du message à l'utilisateur
                $messageCopy = "Votre demande à MAJ a bien été reçue, nous vous répondrons dans les plus brefs délais.\r\n \r\nVotre message:\r\n$message\r\n \r\nMerci de ne pas répondre à ce mail.";
                mail($emailUser, $subject, $messageCopy, 'From: ' . $pages->find('contact')->maj());

                // puis on fait une redirection du navigateur vers la page de confirmation
                header('Location: ' . $pages->find('contact/confirmation')->url()); 
                // enfin on s'assure que la suite du code n'est pas exécutée une fois la redirection effectuée
                exit; 
            } else { // si false
                // on fait une redirection du navigateur vers la page d'erreur
                header('Location: ' . $pages->find('contact/echec')->url()); 
                // enfin on s'assure que la suite du code n'est pas exécutée une fois la redirection effectuée
                exit; 
            }
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
?>