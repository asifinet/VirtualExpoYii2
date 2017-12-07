<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "exstandcomp".
 *
 * @property integer $id
 * @property integer $stand_owner_id
 * @property string $company_logo
 */
class exstandcomp extends \yii\db\ActiveRecord
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
            [['id', 'stand_owner_id'], 'integer'],
            [['stand_owner_id', 'company_logo'], 'required'],
            [['company_logo'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stand_owner_id' => 'Stand Owner ID',
            'company_logo' => 'Company Logo',
        ];
    }
}
