<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;

/** @var yii\web\View $this */
/** @var app\models\PhotoProduct $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="photo-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_product')->DropDownList(models\PhotoProduct::dropDownListProduct(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'photo_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
