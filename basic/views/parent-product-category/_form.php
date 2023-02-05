<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;

/** @var yii\web\View $this */
/** @var app\models\ParentProductCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="parent-product-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_category')->DropDownList(models\ParentProductCategory::dropDownListCategory(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_parent_category')->DropDownList(models\ParentProductCategory::dropDownListCategory(),['prompt' => 'Выберите значение...'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
