<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\Ads;
use app\models\AdsSearch;

class SiteController extends Controller
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
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['logout'],
				'rules' => [
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		$searchModel = new AdsSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('//ads/index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionUserads()
	{
		$searchModel = new AdsSearch();
		$user = new User();
		$user = Yii::$app->user->identity;

		$dataProvider = $searchModel->search(Yii::$app->request->queryParams, Yii::$app->user->id);

		return $this->render('//ads/index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'user' => $user
		]);
	}

	/**
	 * Login action.
	 *
	 * @return Response|string
	 */
	public function actionLogin()
	{
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		}
		return $this->render('login', [
			'model' => $model,
		]);
	}

	/**
	 * Logout action.
	 *
	 * @return Response
	 */
	public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->goHome();
	}

	/**
	 * Displays contact page.
	 *
	 * @return Response|string
	 */
	public function actionContact()
	{
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
			Yii::$app->session->setFlash('contactFormSubmitted');

			return $this->refresh();
		}
		return $this->render('contact', [
			'model' => $model,
		]);
	}

	/**
	 * Displays about page.
	 *
	 * @return string
	 */
	public function actionAbout()
	{
		return $this->render('about');
	}

	/**
	 * Displays moder page.
	 *
	 * @return string
	 */
	public function actionModerate()
	{
		return $this->render('moderate');
	}


	public function actionSignup()
	{
		$model = new SignupForm();

		if ($model->load(Yii::$app->request->post())) {
			if ($user = $model->signup()) {

				$auth = Yii::$app->authManager;
				$auth->assign($auth->getRole('user'), $user->id);

				if (Yii::$app->getUser()->login($user)) {
					return $this->goHome();
				}
			}
		}

		return $this->render('signup', [
			'model' => $model,
		]);
	}


}
