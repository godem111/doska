<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ads-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ads_id') ?>

    <?= $form->field($model, 'ads_name') ?>

    <?= $form->field($model, 'ads_desk') ?>

    <?= $form->field($model, 'ads_price') ?>

    <?= $form->field($model, 'ads_status') ?>

    <?php // echo $form->field($model, 'ads_parent_user_id') ?>

    <?php // echo $form->field($model, 'ads_create_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
