<?php

/* @var $this yii\web\View */
/* @var $model \matejch\pageGuide\PageGuide */

$this->title = Yii::t('pageGuide/view','update guide',['id' => $model->id]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('pageGuide/view','page guide'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guide-update mt-20 w-full px-4">

    <h1 class="mt-1 mb-2 text-xl"><?= $this->title ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
