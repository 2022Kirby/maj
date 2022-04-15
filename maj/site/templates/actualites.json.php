<?php

foreach($actualites as $actualite){
    $html .= snippet('actualites', ['actualite' => $actualite], true);

}
$json['html'] = $html;
$json['more'] = $more;

echo json_encode($json);

?>