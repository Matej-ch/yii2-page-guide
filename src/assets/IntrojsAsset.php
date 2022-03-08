<?php

namespace matejch\pageGuide\assets;

use yii\web\AssetBundle;

class IntrojsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower-asset/intro.js/minified/';

    public $css = [
        'introjs.min.css',
    ];

    public $js = [
        'intro.min.js',
    ];
}