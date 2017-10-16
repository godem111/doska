<?php
namespace models;

use app\models\User;
use app\models\Ads;
use Yii;

class AdsTest extends \Codeception\Test\Unit
{
	/**
	 * @var \UnitTester
	 */
	protected $tester;

	public function testDeleteSomeAds()
	{
		$user = User::findIdentity(10);
		expect_not($user == null);
		$someAds = Ads::find()->where(['not in', 'ads_parent_user_id', [$user->id]])->one();
		expect_not($someAds == null);
		expect_not(!Yii::$app->authManager->checkAccess($someAds->ads_parent_user_id,'updateTovar', ['ads' => $someAds]));
	}

	public function testUpdateAndSaveMyAds()
	{
		$user = User::findIdentity(10);
		expect_not($user == null);
		$myAds = Ads::find()->where(['ads_parent_user_id' => $user->id])->one();
		expect_not($myAds == null);
		expect_that(!Yii::$app->authManager->checkAccess($myAds->ads_parent_user_id,'updateTovar', ['ads' => $myAds]));
		expect_that(!Yii::$app->authManager->checkAccess($myAds->ads_parent_user_id,'deleteOwnTovar', ['ads' => $myAds]));
	}

}