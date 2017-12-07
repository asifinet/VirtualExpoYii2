<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;
use frontend\models\UploadForm;
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
 * @property string $mkt_doc_dir
 * @property string $created_datetime
 * @property string $remember_token
 *
 * @property ExpoMktDoc[] $expoMktDocs
 * @property ExpoStand[] $expoStands
 */
class ExpoCompany extends \yii\db\ActiveRecord
{

    public $mkt_doc_dir;
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
            [[ 'company_name','company_rep_name','address', 'office_phone', 'primary_email', 'secondary_email','file'], 'required'],
            [['created_datetime'], 'safe'],
            [['username', 'company_name', 'company_sname', 'company_rep_name', 'primary_email', 'secondary_email'], 'string', 'max' => 200],
            [['address', 'remember_token','mkt_doc_dir','file'], 'string', 'max' => 1000],
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
            'company_name' => 'Company Name',
            'company_rep_name' => 'Company RepName',
            'address' => 'Address',
            'office_phone' => 'Office Phone',
            'primary_email' => 'Primary Email',
            'secondary_email' => 'Secondary Email',
            'file' => 'Company Logo',
        ];
    }

   

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->doc_name = UploadedFile::getInstances($model, 'doc_name');
            if ($model->uploadmulti()) {
                // file is uploaded successfully
               // return;
            }
        }

      //  return $this->render('upload', ['model' => $model]);
    }
    public function upload($imageName,$file1)
    {
       // if ($this->validate()) {
        $file1->saveAs('assets/uploads/' . $file1->baseName.'-'.$imageName . '.' . $file1->extension);
            //$this->mkt_doc_dir->saveAs('../web/assets/uploads/' . $this->mkt_doc_dir->baseName . '.' . $this->mkt_doc_dir->extension);
            return true;
       // } else {
        //    return false;
     //   }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpoMktDocs()
    {
        return $this->hasMany(ExpoMktDoc::className(), ['comp_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpoStands()
    {
        return $this->hasMany(ExpoStand::className(), ['stand_owner_id' => 'id']);
    }
}
