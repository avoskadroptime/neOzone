<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CartHasProducts $model */

$this->title = 'Update Cart Has Products: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cart Has Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cart-has-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
