<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VideoReview $model */

$this->title = 'Create Video Review';
$this->params['breadcrumbs'][] = ['label' => 'Video Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-review-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
