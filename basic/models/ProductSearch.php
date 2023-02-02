<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'id_user', 'id_category', 'discount_perc', 'discount_price', 'rating'], 'integer'],
            [['name', 'created_at', 'updated_at', 'description', 'characteristic', 'method_of_use'], 'safe'],
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
        $query = Product::find();

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
            'price' => $this->price,
            'id_user' => $this->id_user,
            'id_category' => $this->id_category,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'discount_perc' => $this->discount_perc,
            'discount_price' => $this->discount_price,
            'rating' => $this->rating,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'characteristic', $this->characteristic])

            ->andFilterWhere(['like', 'method_of_use', $this->method_of_use]);

        return $dataProvider;
    }
}
