<?php

use yii\helpers\Html;

?>
<template id="element-input-template">
    <div class="w-full max300 well-block px-4 py-4 mx-2 js-rule-container relative">
        <div class="w-full">
            <label class="control-label"><?= Yii::t('pageGuide/view','step') ?></label>
            <input type="number" step="1" min="1" value="" name="PageGuide[rules][][step]" class="form-control js-step">
        </div>
        <div class="w-full">
            <label class="control-label"><?= Yii::t('pageGuide/view','element') ?></label>
            <input type="text" value="" name="PageGuide[rules][][element]" class="form-control js-element">
        </div>
        <div class="w-full">
            <label class="control-label"><?= Yii::t('pageGuide/view','position') ?></label>
            <?= Html::dropDownList("PageGuide[rules][][position]", 'bottom', [
                    'right' => Yii::t('pageGuide/view','right'),
                    'left' => Yii::t('pageGuide/view','left'),
                    'bottom' => Yii::t('pageGuide/view','bottom'),
                    'top' => Yii::t('pageGuide/view','top')
                ], ['class' => 'form-control js-position']) ?>
        </div>

        <div class="w-full">
            <label class="control-label"><?= Yii::t('pageGuide/view','element_title') ?></label>
            <input name="PageGuide[rules][][title]" value="" class="form-control js-title">
        </div>

        <div class="w-full">
            <label class="control-label"><?= Yii::t('pageGuide/view','element_help') ?></label>
            <textarea name="PageGuide[rules][][intro]" cols="30" rows="10" class="form-control js-intro"></textarea>
        </div>
        <div class="w-full mt-2 js-dragzone container-flex-new text-center dragzone">
            <?= Yii::t('pageGuide/view','help_4') ?>
        </div>

        <a href="#" class="absolute text-red-800 cursor-pointer top-0 right-1 js-remove-el font-bold text-2xl">&times;</a>
    </div>
</template>