<?php
namespace app\rbac;

use Yii;
use yii\rbac\Rule;

class AuthorRule extends Rule
{
	public $name = 'isAuthor';

	public function execute($userId, $item, $params)
	{
		if (!Yii::$app->user->isGuest) {
			if (\Yii::$app->user->id == 1) {
				return true;
			}
			return isset($params['ads']) ? $params['ads']->ads_parent_user_id == $userId : false;
		}
		return false;
	}
}