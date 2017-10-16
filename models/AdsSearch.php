<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * AdsSearch represents the model behind the search form about `app\models\Ads`.
 */
class AdsSearch extends Ads
{
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['ads_id', 'ads_price', 'ads_status', 'ads_parent_user_id', 'ads_create_date'], 'integer'],
			[['ads_name', 'ads_desk'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params, $iserId = NULL)
	{
		$query = Ads::find();

		// add conditions that should always apply here

		if (Yii::$app->user->id != 1) {
			if ($iserId) {
				$query->onCondition(['ads_parent_user_id' => $iserId]);
			} else $query->onCondition(['ads_status' => 1]);
		} else if ($iserId) {
			$query->onCondition(['ads_parent_user_id' => $iserId]);
		}
		$query->orderBy('ads_create_date DESC');

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		$query->andFilterWhere([
			'ads_id' => $this->ads_id,
			'ads_price' => $this->ads_price,
			'ads_status' => $this->ads_status,
			'ads_parent_user_id' => $this->ads_parent_user_id,
			'ads_create_date' => $this->ads_create_date,
		]);

		$query->andFilterWhere(['like', 'ads_name', $this->ads_name])
			->andFilterWhere(['like', 'ads_desk', $this->ads_desk]);

		return $dataProvider;
	}
}
