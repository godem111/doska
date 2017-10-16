<?php
namespace app\commands;


use app\rbac\AuthorRule;
use Yii;
use yii\console\Controller;
use app\models\User;
use app\models\Ads;

class RbacController extends Controller
{
	public function actionInit()
	{
		$auth = Yii::$app->authManager;
		$auth->removeAll();

		$rule = new AuthorRule();
		$auth->add($rule);

		$createTovar = $auth->createPermission('createTovar');
		$createTovar->description = 'Разрешение на создание товара';
		$auth->add($createTovar);

		$updateTovar = $auth->createPermission('updateTovar');
		$updateTovar->description = 'Разрешение на редактирование товара';
		$auth->add($updateTovar);

		$deleteOwnTovar = $auth->createPermission('deleteOwnTovar');
		$deleteOwnTovar->description = 'Разрешение на удаление товара';
		$deleteOwnTovar->ruleName = $rule->name;
		$auth->add($deleteOwnTovar);
		$auth->addChild($deleteOwnTovar, $updateTovar);

		$updateOwnTovar = $auth->createPermission('updateOwnTovar');
		$updateOwnTovar->description = 'Разрешение на редактирование только своего товара';
		$updateOwnTovar->ruleName = $rule->name;
		$auth->add($updateOwnTovar);
		$auth->addChild($updateOwnTovar, $updateTovar);


		$user = $auth->createRole('user');
		$auth->add($user);

		$auth->addChild($user, $createTovar);
		$auth->addChild($user, $updateOwnTovar);
		$auth->addChild($user, $deleteOwnTovar);

		$admin = $auth->createRole('admin');
		$auth->add($admin);

		$auth->addChild($admin, $user);
		$auth->addChild($admin, $updateTovar);

		// переназначаем роли пользователям
		foreach (User::find()->all() as $userItem) {
			if ($userItem->id == 1) $auth->assign($auth->getRole('admin'), $userItem->id);
			else $auth->assign($auth->getRole('user'), $userItem->id);
		}

		$this->stdout('Done!' . PHP_EOL);
	}


	public function actionTest()
	{
//		Yii::$app->set('request', new \yii\web\Request());
//		$auth = Yii::$app->authManager;
//		$user = User::findIdentity(1);
//		$auth->removeAll($user->id);

//		print_r($auth->getRolesByUser($user->id));

//		$user = new User(['id' => 1, 'username' => 'User']);
//		Yii::$app->user->login($user);

//		$auth->assign($auth->getRole('user'), $user->id);
//		var_dump(Yii::$app->user->can('user'));

		$auth = Yii::$app->authManager;

		$user = User::findIdentity(10);
		expect_not($user == null);

		//Ищем чужое объявление
		$someAds = new Ads();
		$myAds = new Ads();

		$someAds = $someAds->find()->where(['not in', 'ads_parent_user_id', [$user->id]])->one();
		$myAds = $myAds->find()->where(['ads_parent_user_id' => $user->id])->one();
		expect_not($someAds == null);


		echo 'My Ads ID - ' . $myAds->ads_id . ' - User ID - ' . $myAds->ads_parent_user_id;
		var_dump(!$auth->checkAccess($myAds->ads_parent_user_id, 'updateTovar', ['ads' => $myAds]));

		echo 'Some Ads ID - ' . $someAds->ads_id . ' - User ID - ' . $someAds->ads_parent_user_id;
		var_dump(!$auth->checkAccess($someAds->ads_parent_user_id, 'updateTovar', ['ads' => $someAds]));
	}
}