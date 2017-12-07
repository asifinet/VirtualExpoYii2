<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ExpoLookup;

/**
 * ExpoSearchLookup represents the model behind the search form about `backend\models\ExpoLookup`.
 */
class ExpoSearchLookup extends ExpoLookup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sno'], 'integer'],
            [['colum_name', 'description', 'value', 'status'], 'safe'],
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
        $query = ExpoLookup::find();

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
            'sno' => $this->sno,
        ]);

        $query->andFilterWhere(['like', 'colum_name', $this->colum_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
