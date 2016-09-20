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
    public $id_activity;
    public $check2;
	public function rules()
	{
	    return [
	        ['uname', 'string'],
	        ['level', 'string'],
	        ['coordinator', 'string'],
	        ['startdate', 'default'],
	        ['finishdate', 'default'],
	        ['id_activity', 'default'],
	        [['uname', 'level', 'coordinator', 'startdate', 'finishdate', 'id_activity'], 'required', 'when' => function () {
                    if (!$this->uname && !$this->level && !$this->coordinator && !$this->startdate && !$this->finishdate) {
                        $this->addError('uname', 'Необходимо указать либо телефон, либо email.');
                        $this->addError('level', 'Необходимо указать либо телефон, либо email.');
                        $this->addError('coordinator', 'Необходимо указать либо телефон, либо email.');
                    }
                }]
	    ];
	}
}