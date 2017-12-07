<?php 

namespace api\modules\v1\models;
use Yii;
use \yii\db\ActiveRecord;

/**
 * Country Model
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class Company extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {  Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return 'expo_company';
    }

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['id', 'company_name', 'address','city','state','country','zip_postal','company_rep_name', 'office_phone', 'primary_email','file'], 'required']
        ];
    }
    public function getStands()
    {
        return $this->hasMany(Stand::className(), ['stand_owner_id' => 'id']);
    }

}