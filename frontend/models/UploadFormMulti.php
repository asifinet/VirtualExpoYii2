<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadFormMulti extends Model
{
    /**
     * @var UploadedFile
     */
    public $mkt_doc_dir;

    public function rules()
    {
        return [
            [['mkt_doc_dir'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->mkt_doc_dir as $file) {
                $file->saveAs('../web/assets/uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}
?>
