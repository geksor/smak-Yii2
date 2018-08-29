<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Registration;

/**
 * RegistrationSearch represents the model behind the search form of `backend\models\Registration`.
 */
class RegistrationSearch extends Registration
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'insurance', 'date', 'viewed'], 'integer'],
            [['name', 'email', 'tel'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
    public function search($params)
    {
        $query = Registration::find();

        // add conditions that should always apply here

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
            'id' => $this->id,
            'insurance' => $this->insurance,
            'date' => $this->date,
            'viewed' => $this->viewed,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tel', $this->tel]);

        $query->orderBy(['viewed' => SORT_ASC, 'date' => SORT_ASC]);

        return $dataProvider;
    }
}
