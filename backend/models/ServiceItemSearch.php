<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ServiceItem;

/**
 * ServiceItemSearch represents the model behind the search form of `backend\models\ServiceItem`.
 */
class ServiceItemSearch extends ServiceItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'day_count', 'price', 'publish', 'order'], 'integer'],
            [['title'], 'safe'],
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
    public function search($params, $typeId = null)
    {
        $query = ServiceItem::find();

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
            'type_id' => $typeId,
            'day_count' => $this->day_count,
            'price' => $this->price,
            'publish' => $this->publish,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        $query->orderBy(['order' => SORT_ASC]);

        return $dataProvider;
    }
}
