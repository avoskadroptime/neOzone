<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReviewHasDisLikes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="review-has-dis-likes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_review')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_like')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
