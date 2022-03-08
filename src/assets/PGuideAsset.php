<?php

namespace matejch\pageGuide\assets;

use yii\web\AssetBundle;

class PGuideAsset extends AssetBundle
{
    public $sourcePath = '@matejch/pageGuide/web';

    public $css = [
        'css/assist.min.css',
    ];

    public $js = [
        'js/assist.min.js',

    ];

    public $depends = [];
}