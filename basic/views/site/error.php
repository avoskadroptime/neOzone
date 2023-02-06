<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;

$this->title = 'Ошибка: ' . $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Похоже что-то пошло не так...
    </p>
    <p>
        Пожалуйста, свяжитесь с нами если вы думаете, что эта ошибка со стороны сервера.
    </p>

</div>
