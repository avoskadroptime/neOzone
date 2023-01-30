<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VideoReview $model */

$this->title = 'Update Video Review: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Video Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="video-review-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
