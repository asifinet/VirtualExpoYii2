<?php

namespace api\modules\v1\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use api\modules\v1\models\Mktdocs;

/**
 * ExpoCompanySearch represents the model behind the search form about `backend\models\ExpoCompany`.
 */
class MktdocsSearch extends Mktdocs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doc_id', 'comp_id', 'stand_id'], 'integer'],
            [['doc_name'], 'safe'],
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
        $query = Mktdocs::find();

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
            'doc_id' => $this->doc_id,
            'comp_id' => $this->comp_id,
            'stand_id' => $this->stand_id,
        ]);

        $query->andFilterWhere(['like', 'doc_name', $this->doc_name]);

        return $dataProvider;
    }
}
