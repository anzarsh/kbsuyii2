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
	        ['startdate', 'default'],
	        ['finishdate', 'default'],
	        [['uname', 'level', 'coordinator', 'startdate', 'finishdate'], 'required', 'when' => function () {
                    if (!$this->uname && !$this->level && !$this->coordinator && !$this->startdate && !$this->finishdate) {
                        $this->addError('uname', 'Необходимо указать либо телефон, либо email.');
                        $this->addError('level', 'Необходимо указать либо телефон, либо email.');
                        $this->addError('coordinator', 'Необходимо указать либо телефон, либо email.');
                    }
                }]
	    ];
	}
}