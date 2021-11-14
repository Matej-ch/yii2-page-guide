<template id="element-input-template">
    <div class="w-full max300 well-block px-4 py-4 mx-2">
        <div class="w-full">
            <label class="control-label"><?= Yii::t('pageGuide/view','step') ?></label>
            <input type="number" step="1" min="1" value="" name="PageGuide[rules][][step]" class="form-control js-step">
        </div>
        <div class="w-full">
            <label class="control-label"><?= Yii::t('pageGuide/view','element') ?></label>
            <input type="text" value="" name="PageGuide[rules][][element]" class="form-control js-element">
        </div>
        <div class="w-full">
            <label class="control-label"><?= Yii::t('pageGuide/view','element_help') ?></label>
            <textarea name="PageGuide[rules][][intro]" cols="30" rows="10" class="form-control js-intro"></textarea>
        </div>
        <div class="w-full mt-2 js-dragzone container-flex-new text-center dragzone">
            <?= Yii::t('pageGuide/view','help_4') ?>
        </div>
    </div>
</template>