<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Contract;

/**
 * ContractSearch represents the model behind the search form about `backend\models\Contract`.
 */
class ContractSearch extends Contract
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'guarantee'], 'integer'],
            [['price'], 'number'],
            [['title','deadline_complete', 'deadline_application', 'object', 'contract_more', 'status', 'annex', 'checkout','filePath'], 'safe']
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
        $query = Contract::find();

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
			'title' => $this->title,
            'price' => $this->price,
            'deadline_complete' => $this->deadline_complete,
            'deadline_application' => $this->deadline_application,
            'guarantee' => $this->guarantee,
			'filePath' => $this->filePath,
        ]);

        $query->andFilterWhere(['like', 'object', $this->object])
            ->andFilterWhere(['like', 'contract_more', $this->contract_more])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'annex', $this->annex])
            ->andFilterWhere(['like', 'checkout', $this->checkout]);

        return $dataProvider;
    }
}
