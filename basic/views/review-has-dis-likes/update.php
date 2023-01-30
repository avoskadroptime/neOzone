<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReviewHasDisLikes $model */

$this->title = 'Update Review Has Dis Likes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Review Has Dis Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="review-has-dis-likes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
