<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReviewHasDisLikes $model */

$this->title = 'Create Review Has Dis Likes';
$this->params['breadcrumbs'][] = ['label' => 'Review Has Dis Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-has-dis-likes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
