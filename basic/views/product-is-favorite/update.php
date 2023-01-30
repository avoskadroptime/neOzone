<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductIsFavorite $model */

$this->title = 'Update Product Is Favorite: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Is Favorites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-is-favorite-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
