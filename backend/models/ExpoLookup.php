<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "expo_lookup".
 *
 * @property integer $sno
 * @property string $colum_name
 * @property string $description
 * @property string $value
 * @property string $status
 */
class ExpoLookup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expo_lookup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['colum_name', 'description', 'value'], 'required'],
            [['colum_name', 'value'], 'string', 'max' => 500],
            [['description'], 'string', 'max' => 1000],
            [['status'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sno' => 'Sno',
            'colum_name' => 'Colum Name',
            'description' => 'Description',
            'value' => 'Value',
            'status' => 'Status',
        ];
    }
}
