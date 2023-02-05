<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;

/** @var yii\web\View $this */
/** @var app\models\CartHasProducts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cart-has-products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cart')->DropDownList(models\CartHasProducts::dropDownListCart(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_product')->DropDownList(models\CartHasProducts::dropDownListProduct(),['prompt' => 'Выберите значение...'])?>


    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
