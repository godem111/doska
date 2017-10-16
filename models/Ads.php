<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "ads".
 *
 * @property integer $ads_id
 * @property string $ads_name
 * @property string $ads_desk
 * @property integer $ads_price
 * @property integer $ads_status
 * @property integer $ads_parent_user_id
 * @property integer $ads_create_date
 */
class Ads extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'ads';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['ads_name', 'ads_desk', 'ads_price', 'ads_status'], 'required'],
			[['ads_desk'], 'string'],
			[['ads_price', 'ads_status', 'ads_parent_user_id', 'ads_create_date'], 'integer'],
			[['ads_name'], 'string', 'max' => 255],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'ads_id' => 'ID объявления',
			'ads_name' => 'Наименование',
			'ads_desk' => 'Описание',
			'ads_price' => 'Цена',
			'ads_status' => 'Статус объявления',
			'ads_parent_user_id' => 'Чье объявление',
			'ads_create_date' => 'Дата объявление',
		];
	}


	public function getAuthor()
	{
		return $this->hasOne(User::className(), ['id' => 'ads_parent_user_id']);
	}



	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {

			return true;
		}
		return false;
	}

}
