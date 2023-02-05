<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;

/** @var yii\web\View $this */
/** @var app\models\OrderHasProducts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-has-products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_order')->DropDownList(models\OrderHasProducts::dropDownListOrder(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_product')->DropDownList(models\OrderHasProducts::dropDownListProduct(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
