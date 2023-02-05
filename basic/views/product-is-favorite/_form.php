<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;

/** @var yii\web\View $this */
/** @var app\models\ProductIsFavorite $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-is-favorite-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->DropDownList(models\ProductIsFavorite::dropDownListUser(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_product')->DropDownList(models\ProductIsFavorite::dropDownListProduct(),['prompt' => 'Выберите значение...'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
