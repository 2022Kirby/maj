<?php
return [
    'debug'  => true,
    'markdown' => [
        'extra' => true,
        'breaks' => true,
    ],
    'routes' => [
        [
            'pattern' => '(:any)',
            'action'  => function($uid) {
                $page = page($uid);
                if(!$page) $page = page('services/' . $uid);
                if(!$page) $page = site()->errorPage();
                return site()->visit($page);
            }
        ],
        [
            'pattern' => ['services/(:any)'],
            'action'  => function($uid) {
                go($uid);
            }
        ],
    ]
];
?>