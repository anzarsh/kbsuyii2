<?php

namespace app\models;

use yii\base\Model;

class SearchEvent extends Model
{
    public $uname;
    public $level;
    public $coordinator;
    public $startdate;
    public $finishdate;
	public function rules()
	{
	    return [
	        ['uname', 'string'],
	        ['level', 'string'],
	        ['coordinator', 'string'],
	        ['startdate', 'default', 'value' => date("Y-m-d")],
	        ['finishdate', 'default', 'value' => date("Y-m-d")],
	        [['uname', 'level'], 'required', 'when' => function () {
                    if (!$this->uname && !$this->level) {
                        $this->addError('uname', 'Необходимо указать либо телефон, либо email.');
                        $this->addError('level', 'Необходимо указать либо телефон, либо email.');
                    }
                }]
	    ];
	}
}