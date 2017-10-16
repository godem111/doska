<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ads */

$this->title = 'Создание объявления';
$this->params['breadcrumbs'][] = ['label' => 'Объявления', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
