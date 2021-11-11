<?php

namespace matejch\pageGuide\widget;

use matejch\pageGuide\assets\PGuideAsset;
use matejch\pageGuide\models\PageGuide;
use yii\base\Widget;

class PageAssist extends Widget
{
    public $btnPositionCss;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();

        $guide = PageGuide::findOne(['url' => '/'.\Yii::$app->request->pathInfo]);

        $view = $this->getView();
        if(isset($guide->rules) && !empty($guide->rules)) {
            $view->registerJs("window.rules=$guide->rules");
        }

        PGuideAsset::register($view);

        if(!$guide) { return false; }

        return $this->render('_assist',['rules' => $guide->rules,'btnPositionCss' => $this->btnPositionCss]);
    }
}