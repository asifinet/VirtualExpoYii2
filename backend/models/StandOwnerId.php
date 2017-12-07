<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "exstandcomp".
 *
 * @property integer $stand_owner_id
 * @property string $company_logo
 */
class StandOwnerId extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exstandcomp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stand_owner_id', 'company_logo'], 'required'],
            [['stand_owner_id'], 'integer'],
            [['company_logo'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stand_owner_id' => 'Stand Owner ID',
            'company_logo' => 'Company Logo',
        ];
    }
}
