<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('pageGuide/view','page guide');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guide-index mt-20 w-full px-4">

    <h1 class="mt-1 mb-2 text-xl"><?= $this->title ?></h1>

    <p>
        <?= Html::a(Yii::t('pageGuide/view','create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
            'id',
            'url',
            'rules:ntext',
        ],
    ]) ?>
</div>
