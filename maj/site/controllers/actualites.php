<?php

return function($page){
    $limit    = 6;
    $actualites = $page->children()->listed()->flip()->paginate($limit);

    return [
        'limit'      => $limit,
        'actualites'   => $actualites,  
        'pagination' => $actualites->pagination(),  
        ];
};

?>