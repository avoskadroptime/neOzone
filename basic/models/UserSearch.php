<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_role', 'id_company', 'phone', 'id_city'], 'integer'],
            [['username', 'email', 'currency', 'birth_date', 'gender', 'avatar_name'], 'safe'],
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
        $query = User::find();

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
            'id_role' => $this->id_role,
            'id_company' => $this->id_company,
            'phone' => $this->phone,
            'id_city' => $this->id_city,
            'birth_date' => $this->birth_date,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            //->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'avatar_name', $this->avatar_name]);

        return $dataProvider;
    }
}
