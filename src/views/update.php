<?php

/* @var $this yii\web\View */
/* @var $model \matejch\pageGuide\PageGuide */

$this->title = Yii::t('view','update guide',['id' => $model->id]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('view','page guide'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guide-update mt-20 w-full px-4">

    <?= $this->render('@app/views/templates/_title', ['title' => $this->title]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
