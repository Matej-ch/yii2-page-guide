<?php

namespace matejch\pageGuide;

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

        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['pageGuide'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@matejch/pageGuide/messages',
            'fileMap' => [
                '@matejch/pageGuide/messages/view' => 'view.php',
                '@matejch/pageGuide/messages/model' => 'model.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('@matejch/pageGuide/' . $category, $message, $params, $language);
    }
}