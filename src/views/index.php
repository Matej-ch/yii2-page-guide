<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nápovedy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guide-index mt-20 w-full px-4">

    <?= $this->render('@app/views/templates/_title', ['title' => $this->title]) ?>

    <p>
        <?= Html::a('<i class="fas fa-plus" aria-hidden="true"></i> Vytvoriť', ['create'], ['class' => 'btn btn-success']) ?>
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
    ]); ?>
</div>
