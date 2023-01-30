<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderHasProducts $model */

$this->title = 'Update Order Has Products: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Has Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-has-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
