<?php

namespace matejch\pageGuide;

use matejch\pageGuide\assets\PGuideAsset;
use Yii;
use yii\base\Module;

class PageGuide extends Module
{
    public $controllerNamespace = 'matejch\pageGuide\controllers';

    public $defaultRoute = 'page-guide/index';

    public function init()
    {
        parent::init();

        \Yii::setAlias('@matejch/pageGuide', __DIR__);

        PGuideAsset::register(Yii::$app->view);

        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        if (Yii::$app->has('i18n')) {
            Yii::$app->i18n->translations['pageGuide/*'] = [
                'class'          => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath'       => '@matejch/pageGuide/messages',
                'fileMap' => [
                    'pageGuide/view' => 'view.php',
                    'pageGuide/model' => 'model.php',
                ],
            ];
        }

    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('pageGuide/' . $category, $message, $params, $language);
    }
}