<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PromotionHasProduct $model */

$this->title = 'Update Promotion Has Product: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Promotion Has Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promotion-has-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
