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
 * @property ExpoCompany $standOwner
 */
class Stand extends \yii\db\ActiveRecord
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
            [['date_time'], 'safe'],
            [['event_id', 'code', 'price', 'sq_meter', 'image_ext', 'description', 'stand_owner_id'], 'required'],
            [['event_id', 'event_status', 'email_sent','free_stand', 'stand_owner_id'], 'integer'],
            [['price', 'sq_meter'], 'number'],
            [['code'], 'string', 'max' => 20],
            [['image_ext'], 'string', 'max' => 5],
            [['description'], 'string', 'max' => 1000],
            [['logo_pos'], 'string', 'max' => 1],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExpoEvent::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['stand_owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExpoCompany::className(), 'targetAttribute' => ['stand_owner_id' => 'id']],
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
            'event_status' => 'Event Status',
            'price' => 'Price',
            'sq_meter' => 'Sq Meter',
            'image_ext' => 'Image Ext',
            'description' => 'Description',
            'logo_pos' => 'Logo Pos',
            'email_sent' => 'Email Sent',
            'free_stand' => 'Free Stand',
            'stand_owner_id' => 'Stand Owner ID',
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
