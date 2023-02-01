<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UserHasCard $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-has-card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'validity_period')->textInput() ?>

    <?= $form->field($model, 'CVV')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
