<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProductIsFavorite $model */

$this->title = 'Create Product Is Favorite';
$this->params['breadcrumbs'][] = ['label' => 'Product Is Favorites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-is-favorite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
