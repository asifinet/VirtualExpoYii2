<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $username
 * @property string $company_name
 * @property string $company_sname
 * @property string $primary_email
 * @property string $secondary_email
 * @property string $dir_name
 * @property string $logo
 * @property string $created_date_time
 * @property string $remember_token
 *
 * @property User $id0
 */
class ExpoProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expo_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'username', 'company_name', 'company_sname', 'primary_email', 'secondary_email', 'file',  'created_datetime'], 'required'],
            [['id'], 'integer'],
            [['created_date_time'], 'safe'],
            [['username'], 'string', 'max' => 255],
            [['company_name', 'company_sname'], 'string', 'max' => 200],
            [['primary_email'], 'string', 'max' => 100],
            [['secondary_email'], 'string', 'max' => 200],
            [['file'], 'string', 'max' => 50],
            [['remember_token'], 'string', 'max' => 1000],
            [['file'], 'unique'],
            [['username'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['username' => 'username']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'company_name' => 'Company Name',
            'company_sname' => 'Company Sname',
            'primary_email' => 'Primary Email',
            'secondary_email' => 'Secondary Email',
            'file' => 'Dir Name',
            'created_date_time' => 'Created Date Time',
            'remember_token' => 'Remember Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
