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
    public $id;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
        	['uname', 'string'],
            ['id', 'integer'],
        	[['uname', 'imageFile', 'id'], 'required', 'when' => function () {
                    if (!$this->uname && !$this->imageFile && !$this->id) {

                    }
                }]
        ];
    }
}