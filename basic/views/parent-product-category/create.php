<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ParentProductCategory $model */

$this->title = 'Create Parent Product Category';
$this->params['breadcrumbs'][] = ['label' => 'Parent Product Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parent-product-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
