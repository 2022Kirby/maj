<?php
    return [
        'debug'  => true,
        'markdown' => [
            'extra' => true,
            'breaks' => true,
        ],
        'panel' => [
            'kirbytext' => [
                'fileDragText' => function(Kirby\Cms\File $file, $url) {
                    // if($file->type() === 'image') {
                    //     return sprintf('(image: %s text: %s)', $url, $file->title()->or('Some fallback text')) ;
                    // }

                    if($file->type() === 'document') {
                        return sprintf('(file: %s text: %s)', $url, $file->alt()->or($file->name()));
                    }

                    return null;
                }

            ],
        ],
    ];
?>