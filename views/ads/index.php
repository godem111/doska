<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объявления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-index">

	<h1><?php
		if (Yii::$app->controller->action->id == 'userads') echo Html::encode($this->title) . ' пользователя ' . Yii::$app->user->identity->username;
		else echo Html::encode($this->title);
		?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Создать объявление', ['ads/create'], ['class' => 'btn btn-success']) ?>
	</p>


	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

//			'ads_id',
			'ads_name',
			'ads_desk:ntext',
			'ads_price',
			[
				'attribute' => 'ads_status',
				'content' => function ($data) {
					return $data->ads_status ? 'Активное' : 'Скрытое';
				}
			],

			[
				'attribute' => 'ads_parent_user_id',
				'content' => function ($data) {

					return $data->author->username;
				}
			],
//			'ads_parent_user_id',
			[
				'attribute' => 'ads_create_date',
				'content' => function ($data) {

					return Yii::$app->formatter->asDate($data->ads_create_date);
				}
			],

			[
				'class' => 'yii\grid\ActionColumn',
				'buttons' => [
					'view' => function ($url, $model) {
						$customurl = Yii::$app->getUrlManager()->createUrl(['ads/view', 'id' => $model->ads_id]);
						return \yii\helpers\Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
							['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
					},

					'update' => function ($url, $model) {
						$customurl = Yii::$app->getUrlManager()->createUrl(['ads/update', 'id' => $model->ads_id]);
						return \yii\helpers\Html::a('<span class="glyphicon glyphicon-pencil"></span>', $customurl,
							['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
					},
					'delete' => function ($url, $model) {
						$customurl = Yii::$app->getUrlManager()->createUrl(['ads/delete', 'id' => $model->ads_id]);
						return \yii\helpers\Html::a('<span class="glyphicon glyphicon-trash"></span>', $customurl,
							['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
					}
				],
				'template' => '{view} {update} {delete}',
			],
		],
	]); ?>


</div>
