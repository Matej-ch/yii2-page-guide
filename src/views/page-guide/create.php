<?php

/* @var $this yii\web\View */
/* @var $model \matejch\pageGuide\models\PageGuide */

$this->title = Yii::t('pageGuide/view','create guide');
$this->params['breadcrumbs'][] = ['label' => Yii::t('pageGuide/view','page guide'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guide-create mt-20 w-full px-4">

    <h1 class="mt-1 mb-2 text-xl"><?= $this->title ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'rulesError' => $rulesError ?? null
    ]) ?>

</div>
