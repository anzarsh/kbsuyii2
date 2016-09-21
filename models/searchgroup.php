<?php

namespace app\models;

use yii\base\Model;

class SearchGroup extends Model
{
    public $uname;

	public function rules()
	{
	    return [
	        ['uname', 'string'],

	        [['uname'], 'required', 'when' => function () {
                    if (!$this->uname) {
                        $this->addError('uname', 'Необходимо указать либо телефон, либо email.');
                    }
                }]
	    ];
	}
}