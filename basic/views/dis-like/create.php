<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DisLike $model */

$this->title = 'Create Dis Like';
$this->params['breadcrumbs'][] = ['label' => 'Dis Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dis-like-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
