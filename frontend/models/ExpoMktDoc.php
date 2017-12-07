<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "expo_mkt_doc".
 *
 * @property integer $doc_id
 * @property string $doc_name
 * @property string $doc_path
 * @property string $doc_ext
 * @property integer $comp_id
 * @property integer $stand_id
 *
 * @property ExpoCompany $comp
 * @property ExpoStand $stand
 */
class ExpoMktDoc extends \yii\db\ActiveRecord
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
            [['doc_path', 'doc_ext', 'comp_id'], 'required'],
            [['comp_id', 'stand_id'], 'integer'],
            [['doc_name'], 'string', 'max' => 20000],
            [['doc_path'], 'string', 'max' => 1000],
            [['doc_ext'], 'string', 'max' => 6],
            [['comp_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExpoCompany::className(), 'targetAttribute' => ['comp_id' => 'id']],
            [['stand_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExpoStand::className(), 'targetAttribute' => ['stand_id' => 'id']],
            [['doc_name'], 'file', 'skipOnEmpty' => false,  'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doc_id' => 'Doc ID',
            'doc_name' => 'Attach Documents',
            'doc_path' => 'Doc Path',
            'doc_ext' => 'Doc Ext',
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
