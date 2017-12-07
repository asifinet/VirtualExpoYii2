<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "expo_company".
 *
 * @property integer $id
 * @property string $username
 * @property string $company_name
 * @property string $company_sname
 * @property string $company_rep_name
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zip_postal
 * @property string $mobile_phone
 * @property string $office_phone
 * @property string $fax
 * @property string $primary_email
 * @property string $secondary_email
 * @property string $company_logo
 * @property string $mkt_doc_dir
 * @property string $created_datetime
 * @property string $remember_token
 */
class ExpoCompany extends \yii\db\ActiveRecord
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
            [['username', 'company_name', 'company_sname', 'company_rep_name', 'address', 'city', 'state', 'country', 'zip_postal', 'office_phone', 'primary_email',  'file', 'remember_token'], 'required'],
            [['created_datetime'], 'safe'],
            [['username', 'company_name', 'company_sname', 'company_rep_name', 'primary_email', 'secondary_email'], 'string', 'max' => 200],
            [['address', 'file', 'remember_token'], 'string', 'max' => 1000],
            [['city', 'state', 'country'], 'string', 'max' => 500],
            [['zip_postal'], 'string', 'max' => 10],
            [['mobile_phone', 'office_phone', 'fax'], 'string', 'max' => 30],
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
            'company_rep_name' => 'Company Rep Name',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'zip_postal' => 'Zip Postal',
            'mobile_phone' => 'Mobile Phone',
            'office_phone' => 'Office Phone',
            'fax' => 'Fax',
            'primary_email' => 'Primary Email',
            'secondary_email' => 'Secondary Email',
            'company_logo' => 'Company Logo',
            'file' => 'Logo Path',
            'created_datetime' => 'Created Datetime',
            'remember_token' => 'Remember Token',
        ];
    }
}
