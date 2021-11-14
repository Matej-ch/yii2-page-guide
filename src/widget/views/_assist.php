<?php

/** @var array $btnPositionCss */

use yii\helpers\Html;

?>

<?=
Html::a('<i class="fas fa-question-circle text-2xl text-blue-500"></i>',
    null,
    ['class' => 'bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded cursor-pointer' ,'id' => 'js-intro-guide','style' => $btnPositionCss]) ?>