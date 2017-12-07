<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "expo_event".
 *
 * @property integer $id
 * @property string $date_timestamp
 * @property string $code
 * @property string $image_type
 * @property string $name
 * @property string $location
 * @property string $latitude
 * @property string $longitude
 * @property string $start_date
 * @property string $start_time
 * @property string $end_date
 * @property string $end_time
 * @property string $description
 *
 * @property ExpoStand[] $expoStands
 */
class ExpoEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expo_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_timestamp'], 'safe'],
            [['code', 'name', 'location', 'start_date', 'start_time', 'end_date', 'end_time', 'description'], 'required'],
            [['code'], 'string', 'max' => 20],
            [['image_type'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 200],
            [['location', 'latitude', 'longitude'], 'string', 'max' => 500],
            [['start_date', 'end_date'], 'string', 'max' => 12],
            [['start_time', 'end_time'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_timestamp' => 'Date Timestamp',
            'code' => 'Code',
            'image_type' => 'Image Type',
            'name' => 'Name',
            'location' => 'Location',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'start_date' => 'Start Date',
            'start_time' => 'Start Time',
            'end_date' => 'End Date',
            'end_time' => 'End Time',
            'description' => 'Description',
        ];
    }
    public static function dropdown(){
        //get and cache data
        static $dropdown;
        if($dropdown===null){
            //get all records from database and generate
            $models= static::find()->all();
            foreach ($models as $model){
                $dropdown[$model->id]  = $model -> id;
            }
        }
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpoStands()
    {
        return $this->hasMany(ExpoStand::className(), ['event_id' => 'id']);
    }
}
