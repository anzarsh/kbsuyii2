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
	        ['course', 'integer']
	    ];
	}
}