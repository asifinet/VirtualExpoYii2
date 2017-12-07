<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "expo_stand".
 *
 * @property integer $id
 * @property string $date_time
 * @property integer $event_id
 * @property string $code
 * @property integer $event_status
 * @property string $price
 * @property string $sq_meter
 * @property string $image_ext
 * @property string $description
 * @property string $logo_pos
 * @property integer $email_sent
 * @property integer $stand_owner_id
 *
 * @property ExpoEvent $event
 * @property ExpoStandCompany $standOwner
 */
class ExpoStand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expo_stand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_time','free_stand'], 'safe'],
            [['event_id', 'code', 'price', 'sq_meter', 'description'], 'required'],
            [['event_id', 'stand_status','free_stand'], 'integer'],
            [['price', 'sq_meter'], 'number'],
            [['code'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 1000],
            [['logo_pos'], 'string', 'max' => 1],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExpoEvent::className(), 'targetAttribute' => ['event_id' => 'id']],
        
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_time' => 'Date Time',
            'event_id' => 'Event ID',
            'code' => 'Code',
            'stand_status' => 'Stand Status',
            'price' => 'Price',
            'sq_meter' => 'Sq Meter',
            'description' => 'Description',
            'logo_pos' => 'Logo Pos',
            'free_stand' =>'Free Stand',
        ];
    }

	
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(ExpoEvent::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStandOwner()
    {
        return $this->hasOne(ExpoCompany::className(), ['id' => 'stand_owner_id']);
    }
}
