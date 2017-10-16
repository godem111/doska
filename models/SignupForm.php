<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{

	public $username;
	public $email;
	public $password;
	public $phone;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['username', 'trim'],
			['username', 'required'],
			['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такое имя уже используется.'],
			['username', 'string', 'min' => 2, 'max' => 255],

			['phone', 'trim'],
			['phone', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Телефон уже занят.'],
			['phone', 'string', 'min' => 2, 'max' => 20],

			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'string', 'max' => 255],
			['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такой Email уже используется.'],
			['password', 'required'],
			['password', 'string', 'min' => 6],
		];
	}

	/**
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails
	 */
	public function signup()
	{

		if (!$this->validate()) {
			return null;
		}

		$user = new User();
		$user->username = $this->username;
		$user->email = $this->email;
		$user->phone = $this->phone;
		$user->logindate_at = time();
		$user->setPassword($this->password);
		$user->generateAuthKey();
		return $user->save() ? $user : null;
	}

}

?>