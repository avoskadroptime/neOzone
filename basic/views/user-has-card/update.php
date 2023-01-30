<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserHasCard $model */

$this->title = 'Update User Has Card: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Has Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-has-card-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
