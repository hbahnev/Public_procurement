<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Applications;

/**
 * ApplicationsSearch represents the model behind the search form about `backend\models\Applications`.
 */
class ApplicationsSearch extends Applications
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'contract_number', 'guarantee', 'owner_id'], 'integer'],
            [['price'], 'number'],
            [['deadline', 'name', 'bulstat', 'address', 'phone', 'Additional', 'isActive'], 'safe'],
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
    public function search($params)
    {
        $query = Applications::find();

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
            'contract_number' => $this->contract_number,
            'price' => $this->price,
            'deadline' => $this->deadline,
            'guarantee' => $this->guarantee,
            'owner_id' => $this->owner_id,
        ]);
			$query->andFilterWhere(['like', 'name', $this->name])
				->andFilterWhere(['like', 'bulstat', $this->bulstat])
				->andFilterWhere(['like', 'address', $this->address])
				->andFilterWhere(['like', 'phone', $this->phone])
				->andFilterWhere(['like', 'Additional', $this->Additional])
				->andFilterWhere(['like', 'isActive', $this->isActive]);
			
			if(Yii::$app->user->identity->isAdmin == 0)
			{
				
				$query->andFilterWhere(['=','owner_id',Yii::$app->user->identity->id]);
			}
			

        return $dataProvider;
    }
}
