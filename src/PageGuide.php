<?php

namespace matejch\pageGuide;

use yii\base\Module;

class PageGuide extends Module
{
    public $controllerNamespace = 'matejch\pageGuide\controllers';

    public $defaultRoute = 'page-guide/index';

    public function init()
    {
        parent::init();
    }
}