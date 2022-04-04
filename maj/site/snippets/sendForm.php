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
        $date = date('d.m.y');
        $time = date('G:i');

        // déclaration de variables qui vont contenir les éléments du mail
        $to = ''; // destinataire du mail
        $subject = $pages->find('contact')->objet(); // objet du mail
        // message
        $message =  $pages->find('contact')->message1() . "\r\n\r\n" .
                    'Prénom Nom : ' . $nameUser . "\r\n" . 
                    'Adresse email : ' . $emailUser . "\r\n" .
                    'Envoyé le '. $date . ' à ' . $time . "\r\n" .
                    'Contenu : ' . "\r\n" . $messageUser;
        // mail(s) développeurs
        $dev = '';
        // pour chaque champ adresse dev de la page contact
        foreach($pages->find('contact')->dev()->toStructure() as $mailDev){
            // si l'index du champ est égal à 0 (string)
            if($mailDev == '0'){
                // concaténation de l'adresse mail seule
                $dev .= $mailDev->adresse();
            } elseif($mailDev != '0'){ // sinon si l'index du champ est différent de 0 (string)
                // concaténation de l'adresse mail précédée d'une virgule
                $dev .= ', ' . $mailDev->adresse();
            }
        }
        // en-têtes supplémentaires
        $headers =  'From: ' . $emailUser . "\r\n" . // expéditeur
                    'Reply-To: ' . $emailUser . "\r\n" . // répondre à
                    'Bcc: ' . $dev . "\r\n" . // copie carbone invisible
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
                        // pour chaque champ adresse mail du service
                        foreach($service->mails()->toStructure() as $mailService){
                            // si l'index du champ est égal à 0 (string)
                            if($mailService == '0'){
                                // concaténation de l'adresse mail seule
                                $to .= $mailService->adresse();
                            } elseif($mailService != '0'){ // sinon si l'index du champ est différent de 0 (string)
                                // concaténation de l'adresse mail précédée d'une virgule
                                $to .= ', ' . $mailService->adresse();
                            }
                        }
                        // concaténation du nom du service
                        $subject .= ' ' . $service->title();
                    }
                }
            }
            
            // si envoi du mail est true
            if(mail($to, $subject, $message, $headers)) {
                // on envoie une copie du message à l'utilisateur
                $messageCopy =  $pages->find('contact')->message2() . "\r\n" . 
                                $messageUser;
                
                mail($emailUser, $subject, $messageCopy, 'From: ' . $pages->find('contact')->maj());

                // puis on fait une redirection du navigateur vers la page de confirmation
                // avec ajout de paramètres dans l'url
                header('Location: ' . $pages->find('contact/confirmation')->url()
                    . '?service=' . $nameService
                    . '&name=' . $nameUser
                    . '&mail=' . $emailUser
                    . '&date=' . $date
                    . '&time=' . $time);
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