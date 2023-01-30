<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\VideoReview $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="video-review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_review')->textInput() ?>

    <?= $form->field($model, 'video_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
