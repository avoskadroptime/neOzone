<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DisLike $model */

$this->title = 'Update Dis Like: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dis Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dis-like-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
