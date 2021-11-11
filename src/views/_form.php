<?php

use yii\helpers\{Html, Json};
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model \matejch\pageGuide\models\PageGuide */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="guide-form">

        <?php $form = ActiveForm::begin(); ?>

        <?php if($model->isNewRecord) { ?>

            <div class="w-full max300 py-4 my-4">
                <p>Vložte url adresu pre ktorú, chcete nastaviť nápovedu</p>
                <p>Otvorte stránku v novom okne a vyberte elementy pre ktoré chcete vytvoriť nápovedu</p>
                <div class="container-flex-new">
                    <input type="text" id="js-url-input" class="form-control">
                    <?= Html::a('Choď na stránku',null,['class' => 'btn btn-cloud','id' => 'js-goto-page'])?>
                </div>
            </div>

            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
        <?php } ?>

        <div id="js-el-container" class="container-flex-new">
            <?php if($model->isNewRecord) { ?>
                <?= $this->render('partials/_rule',['index' => 0]) ?>

            <?php } else { ?>
                <?php $rules  = Json::decode($model->rules);?>
                <?php $index = 0;?>
                <?php foreach ($rules as $rule) { ?>
                    <?= $this->render('partials/_rule',['index' => $index ,'rule' => $rule]) ?>
                    <?php $index++;} ?>
                <?= $this->render('partials/_rule',['index' => $index]) ?>
            <?php } ?>
        </div>

        <div class="px-1 py-1">
            <?= Html::submitButton('Uložiť', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>



    <template id="element-input-template">
        <div class="w-full max300 well-block px-4 py-4 mx-2 js-dragzone">
            <div class="w-full">
                <label class="control-label">Krok</label>
                <input type="number" step="1" min="1" value="" name="Guide[rules][][step]" class="form-control js-step">
            </div>
            <div class="w-full">
                <label class="control-label">Element na ktorý napojiť návod</label>
                <input type="text" value="" name="Guide[rules][][element]" class="form-control js-element">
            </div>
            <div class="w-full">
                <label class="control-label">Nápoveda k elementus</label>
                <textarea name="Guide[rules][][intro]" cols="30" rows="10" class="form-control js-intro"></textarea>
            </div>
            <div class="w-full mt-2 js-dragzone container-flex-new text-center" style="border: 2px dashed #7f7f7f; height: 50px;justify-content: center">
                Presuňte požadovaný element sem
            </div>
        </div>
    </template>

<?php
$scriptGuideForm = <<< JS
var click = 1;

document.querySelector('body').addEventListener('click',function(e) {
  if(e.target.id === 'js-goto-page') {
      e.preventDefault();
      if(document.getElementById('js-url-input') && document.getElementById('js-url-input').value !== '') {
          const url = new URL(document.getElementById('js-url-input').value);
          if(Array.from(url.searchParams).length) {
              window.open(document.getElementById('js-url-input').value + '&guideCreator=1','_blank'); 
          } else {
              window.open(document.getElementById('js-url-input').value + '?guideCreator=1','_blank');
          }
      }
  }
});

function addElement() {
    let tmpl = document.getElementById('element-input-template').content.cloneNode(true);
    tmpl.querySelector('.js-step').name = 'Guide[rules]['+click+'][step]';
    tmpl.querySelector('.js-step').value = click + 1;
    tmpl.querySelector('.js-element').name = 'Guide[rules]['+click+'][element]';
    tmpl.querySelector('.js-intro').name = 'Guide[rules]['+click+'][intro]';
    document.getElementById('js-el-container').appendChild(tmpl);
    click++;
}

  /* events fired on the drop targets */
document.addEventListener("dragover", function( event ) {
  // prevent default to allow drop
  event.preventDefault();
}, false);

document.addEventListener("dragenter", function( event ) {
  // highlight potential drop target when the draggable element enters it
  if (event.target.classList && event.target.classList.contains("js-dragzone")) {
      event.target.style.background = "#e83b3b";
  }
}, false);

document.addEventListener("dragleave", function( event ) {
      // reset background of potential drop target when the draggable element leaves it
  if (event.target.classList && event.target.classList.contains("js-dragzone")) {
      event.target.style.background = "";
  }
  }, false);

document.addEventListener("drop", function( event ) {
  // prevent default action (open as link for some elements)
  event.preventDefault();
  // move dragged elem to the selected drop target
  if (event.target.classList && event.target.classList.contains("js-dragzone")) {
      event.target.style.background = "";
      onDrop(event);
      //dragged.parentNode.removeChild( dragged );
      //event.target.appendChild( dragged );
  }

}, false);


function onDrop(event) {
  const id = event.dataTransfer.getData('id');
  
  //const draggableElement = document.getElementById(id);
  const dropzone = event.target;
  dropzone.parentElement.querySelector('.js-element').value = "#" + id;
  //dropzone.appendChild(draggableElement);
  addElement();
  //event.dataTransfer.clearData();
}

JS;
$this->registerJs($scriptGuideForm,View::POS_READY,'scriptGuideForm');