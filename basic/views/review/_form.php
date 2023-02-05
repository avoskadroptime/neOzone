<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;

/** @var yii\web\View $this */
/** @var app\models\Review $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->DropDownList(models\Review::dropDownListUser(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_product')->DropDownList(models\Review::dropDownListProduct(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pluses')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'minuses')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'count_like')->textInput() ?>

    <?= $form->field($model, 'count_dislike')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'cheked')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
