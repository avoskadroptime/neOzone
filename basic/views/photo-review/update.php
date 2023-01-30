<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PhotoReview $model */

$this->title = 'Update Photo Review: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Photo Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="photo-review-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
