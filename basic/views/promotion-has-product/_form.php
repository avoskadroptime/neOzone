<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PromotionHasProduct $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="promotion-has-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_promotion')->textInput() ?>

    <?= $form->field($model, 'id_product')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
