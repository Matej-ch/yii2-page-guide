<?php

namespace matejch\pageGuide\widget;

use matejch\pageGuide\assets\IntrojsAsset;
use matejch\pageGuide\assets\PGuideAsset;
use matejch\pageGuide\models\PageGuide;
use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\web\View;

class PageAssist extends Widget
{
    public $btnPositionCss;

    public $selectors = [];

    /**
     * Array of additional intro.js options
     *
     * @var array
     */
    public $introOptions = [];

    /**
     * Array of callbacks usable in intro.js
     * Available callbacks
     *      oncomplete
     *      onexit
     *      onbeforeexit
     *      onchange
     *      onbeforechange
     *      onafterchange
     *
     * @var array
     */
    public $introCallbacks = [];

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

            $options = Json::encode(ArrayHelper::merge($this->introOptions,['steps' => Json::decode($guide->rules)]));

            $jsString = "window.guideRules=$options;window.guideLabels=$labels;";
            if(!empty($this->introCallbacks)) {
                $callbacks = $this->filterCallbacks();
                $jsString = "window.guideCallbacks=$callbacks";
            }

            $view->registerJs($jsString);
        }

        if(!empty($this->selectors)) {
            if(is_string($this->selectors)) {
                $this->selectors = [$this->selectors];
            }
            $selectors = Json::encode($this->selectors);
            $view->registerJs("window.guideSelectors=$selectors",View::POS_HEAD);
        }

        PGuideAsset::register($view);
        IntrojsAsset::register($view);

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

    private function filterCallbacks(): string
    {
        return Json::encode(array_intersect_key($this->introCallbacks,array_flip($this->allowedCallbacks())));
    }

    private function allowedCallbacks(): array
    {
        return [
            'oncomplete',
            'onexit',
            'onbeforeexit',
            'onchange',
            'onbeforechange',
            'onafterchange',
        ];
    }
}