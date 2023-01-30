<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PhotoReview $model */

$this->title = 'Create Photo Review';
$this->params['breadcrumbs'][] = ['label' => 'Photo Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-review-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
