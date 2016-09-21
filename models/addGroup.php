<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class AddGroup extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $uname;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        	['uname', 'string'],
        	[['uname'], 'required']
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}