<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;
use yii\helpers\BaseHtml;

/** @var yii\web\View $this */
/** @var app\models\Comment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->DropDownList(models\Comment::dropDownListUser(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'answer_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_review')->DropDownList(models\ReviewHasDisLikes::dropDownListReview(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_comment')->DropDownList(models\Comment::dropDownListComment(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php $params = ['prompt' => 'Выберите значение...',];?>

</div>
