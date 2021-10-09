<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * CustomerSearch represents the model behind the search form of `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_customer', 'Age_cus', 'Code_postal_cus'], 'integer'],
            [['Activity_ID_cus', 'Address_cus', 'City_cus', 'Details_address_cus', 'Fullname_cus', 'Phone_cus', 'Phone_ref_cus', 'Reference_fullname_cus', 'Registration_date_cus', 'Relationship_ref_cus', 'State_cus'], 'safe'],
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
        $query = Customer::find();

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
            'ID_customer' => $this->ID_customer,
            'Age_cus' => $this->Age_cus,
            'Code_postal_cus' => $this->Code_postal_cus,
            'Registration_date_cus' => $this->Registration_date_cus,
        ]);

        $query->andFilterWhere(['like', 'Activity_ID_cus', $this->Activity_ID_cus])
            ->andFilterWhere(['like', 'Address_cus', $this->Address_cus])
            ->andFilterWhere(['like', 'City_cus', $this->City_cus])
            ->andFilterWhere(['like', 'Details_address_cus', $this->Details_address_cus])
            ->andFilterWhere(['like', 'Fullname_cus', $this->Fullname_cus])
            ->andFilterWhere(['like', 'Phone_cus', $this->Phone_cus])
            ->andFilterWhere(['like', 'Phone_ref_cus', $this->Phone_ref_cus])
            ->andFilterWhere(['like', 'Reference_fullname_cus', $this->Reference_fullname_cus])
            ->andFilterWhere(['like', 'Relationship_ref_cus', $this->Relationship_ref_cus])
            ->andFilterWhere(['like', 'State_cus', $this->State_cus]);

        return $dataProvider;
    }
}
