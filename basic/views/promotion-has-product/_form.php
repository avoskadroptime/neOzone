<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;

/** @var yii\web\View $this */
/** @var app\models\PromotionHasProduct $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="promotion-has-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_promotion')->DropDownList(models\PromotionHasProduct::dropDownListPromotion(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_product')->DropDownList(models\PromotionHasProduct::dropDownListProduct(),['prompt' => 'Выберите значение...'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
