<?php

use yii\helpers\{Html, Json};
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \matejch\pageGuide\models\PageGuide */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="guide-form">

        <?php $form = ActiveForm::begin(); ?>

        <?php if($model->isNewRecord) { ?>

            <div class="w-full py-4 my-4">
                <p><?= Yii::t('pageGuide/view','help_1') ?></p>
                <p><?= Yii::t('pageGuide/view','help_2') ?></p>
                <p><?= Yii::t('pageGuide/view','help_3') ?></p>
                <div class="container-flex">
                    <input type="text" id="js-url-input" class="form-control">
                    <div class="my-2">
                        <?= Html::a(Yii::t('pageGuide/view','goto'),null,['class' => 'btn btn-primary','id' => 'js-goto-page'])?>
                    </div>
                </div>
            </div>

            <?= $form->field($model, 'url')->textInput(['maxlength' => true,'class' => 'js-url-form-input form-control']) ?>
        <?php } ?>

        <?php if(isset($rulesError) && !empty($rulesError)) { ?>
            <div class="w-full font-bold text-2xl text-red-800">
                <?= $rulesError ?>
            </div>
        <?php } ?>


        <div id="js-el-container" class="container-flex">
            <?php if($model->isNewRecord) { ?>
                <?= $this->render('partials/_rule',['index' => 0]) ?>

            <?php } else { ?>
                <?php $rules  = Json::decode($model->rules);?>
                <?php $index = 0;?>
                <?php foreach ($rules as $rule) { ?>
                    <?= $this->render('partials/_rule',['index' => $index ,'rule' => $rule]) ?>
                    <?php $index++;} ?>
                <?= $this->render('partials/_rule',['index' => $index]) ?>
            <?php } ?>
        </div>

        <div class="px-1 py-1">
            <?= Html::submitButton(Yii::t('pageGuide/view','save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

<?= $this->render('templates/_rule') ?>