<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PhotoProduct $model */

$this->title = 'Update Photo Product: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Photo Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="photo-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
