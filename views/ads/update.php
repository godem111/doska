<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ads */

$this->title = 'Редактирование объявления: ' . $model->ads_name;
$this->params['breadcrumbs'][] = ['label' => 'Объявления', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ads_name, 'url' => ['view', 'id' => $model->ads_id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="ads-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
