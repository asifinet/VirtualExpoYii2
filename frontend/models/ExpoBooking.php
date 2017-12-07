<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "expo_booking".
 *
 * @property integer $id
 * @property string $date_time
 * @property integer $event_id
 * @property integer $stand_id
 * @property integer $user_id
 * @property string $price
 *
 * @property User $user
 */
class ExpoBooking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expo_booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'date_time', 'event_id', 'stand_id', 'user_id', 'price'], 'required'],
            [['id', 'event_id', 'stand_id', 'user_id'], 'integer'],
            [['date_time'], 'safe'],
            [['price'], 'number'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'stand_id' => 'Stand ID',
            'user_id' => 'User ID',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
