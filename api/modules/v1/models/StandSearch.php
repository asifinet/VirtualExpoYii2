<?php

namespace api\modules\v1\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use api\modules\v1\models\Stand;
use api\modules\v1\models\ExpoCompany;
/**
 * ExpoSearchStand represents the model behind the search form about `backend\models\ExpoStand`.
 */

class StandSearch extends Stand
{  

    public $company_logo1;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'event_id', 'stand_status', 'email_sent', 'stand_owner_id'], 'integer'],
            [['date_time', 'code', 'image_ext', 'description', 'logo_pos','company_logo1'], 'safe'],
            [['price', 'sq_meter'], 'number'],
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
        $query = Stand::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'event_id',
                'code',
                'company_logo1']]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'event_id' => $this->event_id,
            'stand_owner_id' => $this->stand_owner_id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'image_ext', $this->image_ext])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'logo_pos', $this->logo_pos]);

        return $dataProvider;
    }
}
