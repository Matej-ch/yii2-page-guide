<?php

/** @var int $index */

?>


<div class="w-full max300 well-block px-4 py-4 mx-2 js-rule-container relative">
    <div class="w-full">
        <label class="control-label"><?= Yii::t('pageGuide/view','step') ?></label>
        <input type="number" step="1" min="1" value="<?= $rule['step'] ?? $index + 1 ?>" name="PageGuide[rules][<?= $index ?>][step]" class="form-control js-step">
    </div>
    <div class="w-full">
        <label class="control-label"><?= Yii::t('pageGuide/view','element') ?></label>
        <input type="text" value="<?= $rule['element'] ?? '' ?>" name="PageGuide[rules][<?= $index ?>][element]" class="form-control js-element">
    </div>
    <div class="w-full">
        <label class="control-label"><?= Yii::t('pageGuide/view','element_help') ?></label>
        <textarea name="PageGuide[rules][<?= $index ?>][intro]" cols="30" rows="10" class="form-control js-intro"><?= $rule['intro'] ?? '' ?></textarea>
    </div>

    <div class="w-full mt-2 js-dragzone container-flex text-center dragzone">
        <?= Yii::t('pageGuide/view','help_4') ?>
    </div>

    <?php if($index !== 0) { ?>
        <a href="#" class="absolute text-red-800 cursor-pointer top-0 right-1 js-remove-el font-bold text-2xl">&times;</a>
    <?php } ?>
</div>
