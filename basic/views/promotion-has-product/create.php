<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PromotionHasProduct $model */

$this->title = 'Create Promotion Has Product';
$this->params['breadcrumbs'][] = ['label' => 'Promotion Has Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-has-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
