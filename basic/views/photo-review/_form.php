<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;

/** @var yii\web\View $this */
/** @var app\models\PhotoReview $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="photo-review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_review')->DropDownList(models\ReviewHasDisLikes::dropDownListReview(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'photo_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
