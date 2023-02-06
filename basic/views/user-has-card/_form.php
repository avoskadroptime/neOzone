<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\UserHasCard $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-has-card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->DropDownList(models\UserHasCard::dropDownListUser(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'number')->textInput() ?>

    

    <?= $form->field($model, 'validity_period')->widget(DatePicker::class, [
        'options' => ['placeholder' => Yii::t('app', 'Starting Date')],
        'language' => 'ru',
        'attribute2' => 'to_date',
        'pluginOptions' => [
            'autoclose' => true,
            'startView' => 'year',
            'minViewMode' => 'months',
            'format' => 'mm-yyyy',
        ]
    ]); 
    ?>

    <?= $form->field($model, 'CVV')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
