<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "expo_mkt_doc".
 *
 * @property integer $doc_id
 * @property string $doc_name
 * @property integer $comp_id
 * @property integer $stand_id
 *
 * @property ExpoCompany $comp
 * @property ExpoStand $stand
 */
class mktdocs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expo_mkt_doc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comp_id'], 'required'],
            [['comp_id', 'stand_id'], 'integer'],
            [['doc_name'], 'string', 'max' => 20000],
            [['comp_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExpoCompany::className(), 'targetAttribute' => ['comp_id' => 'id']],
            [['stand_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExpoStand::className(), 'targetAttribute' => ['stand_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doc_id' => 'Doc ID',
            'doc_name' => 'Doc Name',
            'comp_id' => 'Comp ID',
            'stand_id' => 'Stand ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComp()
    {
        return $this->hasOne(ExpoCompany::className(), ['id' => 'comp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStand()
    {
        return $this->hasOne(ExpoStand::className(), ['id' => 'stand_id']);
    }
}
