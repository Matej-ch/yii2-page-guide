<?php

namespace matejch\pageGuide\assets;

use yii\web\AssetBundle;

class IntrojsAsset extends AssetBundle
{
    public $css = [
        'https://cdn.jsdelivr.net/npm/intro.js@5.1.0/introjs.css',
    ];

    public $js = [
        'https://cdn.jsdelivr.net/npm/intro.js@5.1.0/intro.min.js',
    ];

    public $jsOptions = [
        'defer' => 'defer',
    ];
}