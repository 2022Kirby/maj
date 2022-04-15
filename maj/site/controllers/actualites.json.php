<?php

return function($page){
    $limit      = 6;
    $actualites = $page->children()->listed()->paginate($limit);
    $pagination = $actualites->pagination();
    $more       = $pagination->hasNextPage();

    return [
        'actualites' => $actualites,
        'more'     => $more,
        'html'     => '',
        'json'     => [],
        ];
};

?>