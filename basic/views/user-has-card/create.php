<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserHasCard $model */

$this->title = 'Create User Has Card';
$this->params['breadcrumbs'][] = ['label' => 'User Has Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-has-card-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
