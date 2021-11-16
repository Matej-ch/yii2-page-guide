<?php

namespace matejch\pageGuide\assets;

use yii\web\AssetBundle;
use yii\web\View;

class PGuideAsset extends AssetBundle
{
    public $sourcePath = '@matejch/pageGuide/web';

    public $css = [
        'css/assist.min.css',
        'css/introjs.min.css',
    ];

    public $js = [
        'js/assist.min.js',
        'js/intro.min.js',

    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    public $depends = [];
}