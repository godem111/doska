<?php

namespace app\controllers;

use Yii;
use app\models\Ads;
use app\models\AdsSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AdsController implements the CRUD actions for Ads model.
 */
class AdsController extends Controller
{
	public function init()
	{
		if (!Yii::$app->user->isGuest) Yii::$app->layout = 'mainIsLogin'; else Yii::$app->layout = 'main';
	}

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
//			'access' => [
//				'class' => AccessControl::className(),
//				'only' => ['logout', 'create', 'delete', 'update'],
//				'rules' => [
//					[
//						'actions' => [
//							'logout',
//							'create',
//							'delete',
//							'update'
//						],
//						'allow' => true,
//						'roles' => ['@'],
//					],
//				],
//			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
					'delete' => ['get']
				],
			],
		];
	}


	/**
	 * Lists all Ads models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new AdsSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Ads model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Ads model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		if (Yii::$app->user->isGuest) {
			Yii::$app->response->redirect(Yii::$app->user->loginUrl);
//			throw new HttpException(403, 'Доступно только для автора!');
		}

		$model = new Ads();
		$model->ads_create_date=time();
		$model->ads_parent_user_id = Yii::$app->user->id;
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->ads_id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing Ads model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		if (!\Yii::$app->user->can('updateOwnTovar', ['ads' => $model])) {
			throw new HttpException(403, 'Доступно только для автора!');
		}

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->ads_id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Ads model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$model=$this->findModel($id);

		if (!\Yii::$app->user->can('updateOwnTovar', ['ads' => $model])) {
			throw new HttpException(403, 'Доступно только для автора!');
		}
		
		$this->findModel($id)->delete();
		return $this->redirect(['index']);
	}

	/**
	 * Finds the Ads model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Ads the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Ads::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
