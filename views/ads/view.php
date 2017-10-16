<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ads */

$this->title = $model->ads_name;
$this->params['breadcrumbs'][] = ['label' => 'Объявления', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Редактировать', ['update', 'id' => $model->ads_id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Удалить', ['delete', 'id' => $model->ads_id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
			],
		]) ?>
	</p>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'ads_id',
			'ads_name',
			'ads_desk:ntext',
			'ads_price',
			'ads_status',
			[
				'attribute' => 'ads_parent_user_id',
				'value' => function ($data) {
					return $data->author->username;
				}
			],
			[
				'attribute' => 'ads_create_date',
				'value' => function ($data) {
					return Yii::$app->formatter->asDate($data->ads_create_date);
				}
			],
		],
	]) ?>

</div>
