<?php

/** @var int $index */

?>


<div class="w-full max300 well-block px-4 py-4 mx-2">
    <div class="w-full">
        <label class="control-label"><?= Yii::t('view','step') ?></label>
        <input type="number" step="1" min="1" value="<?=
        $rule['step'] ?? $index + 1 ?>" name="Guide[rules][<?= $index ?>][step]" class="form-control">
    </div>
    <div class="w-full">
        <label class="control-label"><?= Yii::t('view','element') ?></label>
        <input type="text" value="<?= $rule['element'] ?? '' ?>" name="Guide[rules][<?= $index ?>][element]" class="form-control js-element">
    </div>
    <div class="w-full">
        <label class="control-label"><?= Yii::t('view','element_help') ?></label>
        <textarea name="Guide[rules][<?= $index ?>][intro]" cols="30" rows="10" class="form-control"><?= $rule['intro'] ?? '' ?></textarea>
    </div>

    <div class="w-full mt-2 js-dragzone container-flex-new text-center" style="border: 2px dashed #7f7f7f; height: 50px;justify-content: center">
        <?= Yii::t('view','help_4') ?>
    </div>
</div>
