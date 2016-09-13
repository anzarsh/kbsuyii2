<?php

namespace app\models;

use yii\base\Model;

class SearchUser extends Model
{
    public $uname;
    public $course;
    public $department;

	public function rules()
	{
	    return [
	        ['uname', 'string'],
	        ['course', 'integer'],
	        [['uname', 'course'], 'required', 'when' => function () {
                    if (!$this->uname && !$this->course) {
                        $this->addError('uname', 'Необходимо указать либо телефон, либо email.');
                        $this->addError('course', 'Необходимо указать либо телефон, либо email.');
                    }
                }]
	    ];
	}
}