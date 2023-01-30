<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ParentProductCategory $model */

$this->title = 'Update Parent Product Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Parent Product Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parent-product-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
