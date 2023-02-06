<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models;

/** @var yii\web\View $this */
/** @var app\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->DropDownList(models\Order::dropDownListUser(),['prompt' => 'Выберите значение...'])?>

    <?php //$form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'id_address')->DropDownList(models\Order::dropDownListAddress(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_card')->DropDownList(models\Order::dropDownListCard(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_cart')->DropDownList(models\Order::dropDownListCart(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'id_status')->DropDownList(models\Order::dropDownListStatus(),['prompt' => 'Выберите значение...'])?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?php echo 'Время создания заказа проставляется автоматически.' ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
