<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;

/** @var yii\web\View $this */
/** @var app\models\DeliveryAddress $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="delivery-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->DropDownList(models\DeliveryAddress::dropDownListUser(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_city')->DropDownList(models\DeliveryAddress::dropDownListCity(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'street')->textInput() ?>

    <?= $form->field($model, 'apartament_number')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
