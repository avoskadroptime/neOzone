<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;

/** @var yii\web\View $this */
/** @var app\models\Cart $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->DropDownList(models\Cart::dropDownListUser(),['prompt' => 'Выберите значение...'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
