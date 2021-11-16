<?php

namespace matejch\pageGuide\widget;

use matejch\pageGuide\assets\PGuideAsset;
use matejch\pageGuide\models\PageGuide;
use Yii;
use yii\base\Widget;
use yii\helpers\Json;
use yii\web\View;

class PageAssist extends Widget
{
    public $btnPositionCss;

    public $selectors = [];

    public function init()
    {
        parent::init();

        \Yii::setAlias('@matejch/pageGuide',__DIR__. '/..');

        $this->registerTranslations();
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
            $view->registerJs("window.guideRules=$guide->rules;window.guideLabels=$labels",View::POS_READY);
        }

        if(!empty($this->selectors)) {
            if(is_string($this->selectors)) {
                $this->selectors = [$this->selectors];
            }
            $selectors = Json::encode($this->selectors);
            $view->registerJs("window.guideSelectors=$selectors",View::POS_READY);
        }

        PGuideAsset::register($view);

        if(!$guide) { return false; }

        return $this->render('_assist',['btnPositionCss' => $this->btnPositionCss]);
    }

    public function registerTranslations()
    {
        if (Yii::$app->has('i18n')) {
            Yii::$app->i18n->translations['pageGuide/*'] = [
                'class'          => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'forceTranslation' => true,
                'basePath'       => '@matejch/pageGuide/messages',
                'fileMap' => [
                    'pageGuide/view' => 'view.php',
                    'pageGuide/model' => 'model.php',
                ],
            ];
        }
    }
}