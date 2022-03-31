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
        $messageUser = strip_tags(trim(wordwrap($_POST['message'], 70, "\r\n")));
        $date = date("d/m/y \à G:i");

        // déclaration de variables qui vont contenir les éléments du mail
        $to = ''; // destinataire du mail
        $subject = 'Demande d\'informations '; // objet du mail
        // message
        $message =  $nameUser . "\r\n" . 
                    $emailUser . "\r\n" .
                    $date . "\r\n\r\n" .
                    $messageUser;
        // en-têtes supplémentaires
        $headers =  'From: ' . $emailUser . "\r\n" . // expéditeur
                    'Reply-To: ' . $emailUser . "\r\n" . // répondre à
                    'Bcc: ' . $pages->find('contact')->dev() . "\r\n" . // A MODIFIER copie carbone invisible
                    'X-Mailer: PHP/' . phpversion();

        try {
            // si le service sélectionné est autre
            if($nameService == "Autre"){
                // changement de la valeur de $to et $subject en conséquence
                $to = $pages->find('contact')->autre();
                $subject .= "Autre";
            } else{ //sinon
                // pour chaque page enfant de services
                foreach($pages->find('services')->children()->listed() as $service){
                    // si le nom du service est égal à la valeur de $nameService, on change la valeur de $to et $subject en conséquence
                    if($service->title() == $nameService){
                        // pour chaque champ mails du service
                        foreach($service->mails()->toStructure() as $mail){
                            // si l'index du champ est égal à 0 (string)
                            if($mail == '0'){
                                // concaténation de l'adresse mail seule
                                $to .= $mail->adresse();
                            } elseif($mail != '0'){ // sinon si l'index du champ est différent de 0 (string)
                                // concaténation de l'adresse mail précédée d'une virgule
                                $to .= ', ' . $mail->adresse();
                            }
                        }
                        // concaténation du nom du service
                        $subject .= $service->title();
                    }
                }
            }
            
            // si envoi du mail est true
            if(mail($to, $subject, $message, $headers)) {
                // on envoie une copie du message à l'utilisateur
                $messageCopy = $pages->find('contact')->message() . "\r\n" . $message;
                
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