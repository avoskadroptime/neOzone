<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;

/** @var yii\web\View $this */
/** @var app\models\ReviewHasDisLikes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="review-has-dis-likes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_review')->DropDownList(models\ReviewHasDisLikes::dropDownListReview(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_user')->DropDownList(models\Review::dropDownListUser(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_like')->DropDownList(models\ReviewHasDisLikes::dropDownListLike(),['prompt' => 'Выберите значение...'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
