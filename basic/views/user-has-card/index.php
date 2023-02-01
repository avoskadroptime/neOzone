<?php

use app\models\UserHasCard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserHasCardSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User Has Cards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-has-card-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Has Card', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'number',
            'validity_period',
            'CVV',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UserHasCard $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
