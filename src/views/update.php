<?php

/* @var $this yii\web\View */
/* @var $model \matejch\pageGuide\PageGuide */

$this->title = 'Upraviť nápovedu: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nápovedy', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guide-update mt-20 w-full px-4">

    <?= $this->render('@app/views/templates/_title', ['title' => $this->title]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
