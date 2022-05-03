<?php

namespace matejch\pageGuide\models;

use Exception;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Json;


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
            [['url'], 'string', 'max' => 1024],
            [['url'], 'trim'],
            [['url'], 'filter', 'filter' => 'strip_tags', 'skipOnArray' => true],
            [['rules'], 'validateRuleFormat'],
            [['rules'], 'filter', 'filter' => [$this, 'stepOrder']],
            [['url'], 'filter', 'filter' => function ($value) {
                return parse_url($value, PHP_URL_PATH);
            }],
        ];
    }

    /**
     * validator: validate rules data
     */
    public function validateRuleFormat($attribute, $params, $validator): void
    {
        if (!is_array($this->rules)) {
            try {
                $this->rules = Json::decode($this->rules);
            } catch (Exception $e) {
                $this->rules = '{}';
                $this->addError('rules', Yii::t('pageGuide/model', 'Rules not valid'));
                return;
            }
        }

        $this->rules = array_filter($this->rules, static function ($val) {
            return !empty($val['element']);
        });
        if (empty($this->rules)) {
            $this->rules = '{}';
            $this->addError('rules', Yii::t('pageGuide/model', 'Rules not set'));
            return;
        }

        foreach ($this->rules as $rule) {
            if (!is_array($rule) || !isset($rule['step'], $rule['element'], $rule['intro'])) {
                $this->addError('rules', Yii::t('pageGuide/model', 'Rules not valid'));
                break;
            }
        }
        $this->rules = Json::encode($this->rules);
    }

    /**
     * filter: order rules on step value
     */
    public function stepOrder(string $value): string
    {
        $value = Json::decode($value);
        $keys = array_column($value, 'step');
        array_multisort($keys, SORT_ASC, $value);
        return Json::encode($value);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('pageGuide/model', 'ID'),
            'url' => Yii::t('pageGuide/model', 'Url'),
            'rules' => Yii::t('pageGuide/model', 'Rules'),
        ];
    }
}