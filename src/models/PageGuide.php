<?php

namespace matejch\pageGuide\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "page_guide".
 *
 * @property int $id
 * @property string|null $url
 * @property string|null $rules
 */
class PageGuide extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page_guide';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['rules'], 'string'],
            [['url'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model','ID'),
            'url' => Yii::t('model','Url'),
            'rules' => Yii::t('model','Rules'),
        ];
    }
}