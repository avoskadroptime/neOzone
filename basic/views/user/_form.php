<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;
use kartik\date\DatePicker;


/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_role')->dropDownList(models\User::dropDownListRole(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_company')->dropDownList(models\User::dropDownListCompany(),['prompt' => 'Выберите значение если пользоваытель является менеджер...'])?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'id_city')->dropDownList(models\User::dropDownListCity(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_date')->widget(DatePicker::class, 
        ['options' => [],
        'name' => 'birth_date',
        'language' => 'ru',
        'value'=> 'today',
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayBtn' => true,
            'value'=> 'today',
            'todayHighlight' => true,
        ]
    ]);?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
