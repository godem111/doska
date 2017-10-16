<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Ads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ads-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'ads_name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'ads_desk')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'ads_price')->textInput() ?>

	<?= $form->field($model, 'ads_status')->dropDownList([0 => 'Нет', 1 => ' Да']); ?>

	<!--	--><? //= $form->field($model, 'ads_create_date')->textInput() ?>


	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
