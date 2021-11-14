<?php

namespace matejch\pageGuide\widget;

use matejch\pageGuide\assets\PGuideAsset;
use matejch\pageGuide\models\PageGuide;
use Yii;
use yii\base\Widget;
use yii\helpers\Json;

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
            $labels = Json::encode([
                'prevLabel' => Yii::t('pageGuide/view','prev'),
                'nextLabel' => Yii::t('pageGuide/view','next'),
                'skipLabel' => Yii::t('pageGuide/view','skip'),
                'doneLabel' => Yii::t('pageGuide/view','done')
            ]);
            $view->registerJs("window.rules=$guide->rules;window.guideLabels=$labels");
        }

        PGuideAsset::register($view);

        if(!$guide) { return false; }

        return $this->render('_assist',['rules' => $guide->rules,'btnPositionCss' => $this->btnPositionCss]);
    }
}