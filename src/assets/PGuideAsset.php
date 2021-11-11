<?php

namespace matejch\pageGuide\assets;

use yii\web\AssetBundle;
use yii\web\View;

class PGuideAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/site.css',
        'css/introjs.min.css',
    ];

    public $js = [
        'js/_assist.js',
        'js/intro.min.js',

    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    public $depends = [];
}