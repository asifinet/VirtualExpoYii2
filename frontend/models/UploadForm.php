<?php
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;
use frontend\models\ExpoMktDoc;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $doc_name;

    public function rules()
    {
        return [
            [['doc_name'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
    
    public function uploadmulti()
    {
      
        if ($this->validate()) { 

       
            foreach ($this->doc_name as $file) {
               
                $file->saveAs('../web/assets/uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}
?>
