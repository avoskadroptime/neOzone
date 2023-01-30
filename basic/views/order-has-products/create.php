<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderHasProducts $model */

$this->title = 'Create Order Has Products';
$this->params['breadcrumbs'][] = ['label' => 'Order Has Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-has-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
