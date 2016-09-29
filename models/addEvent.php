<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class AddEvent extends Model
{
    /**
     * @var UploadedFile
     */
    // public $imageFile;
    public $uname;
    public $id_eventlevel;
    public $id_coordinator;
    public $location;
    public $startdate;
    public $finishdate;
    public $id_activity0;
    public $id_activity1;
    public $id_activity2;
    public $id_activity3;
    public $id_eventtype0;
    public $id_eventtype1;
    public $id_eventtype2;
    public $id_eventtype3;
    public $id_eventtype4;
    public $id_eventtype5;
    public $id_eventtype6;
    public $id_eventtype7;
    public $id_eventtype8;
    public $id_eventcomp;
    public $comment;
    public $id;


    public function rules()
    {
        return [
            ['uname', 'string'],
            ['id_eventlevel', 'string'],
            ['id_coordinator', 'string'],
            ['location', 'string'],
            ['startdate', 'default'],
            ['finishdate', 'default'],
            ['id_activity0', 'default'],
            ['id_activity1', 'default'],
            ['id_activity2', 'default'],
            ['id_activity3', 'default'],
            ['id_eventtype0', 'default'],
            ['id_eventtype1', 'default'],
            ['id_eventtype2', 'default'],
            ['id_eventtype3', 'default'],
            ['id_eventtype4', 'default'],
            ['id_eventtype5', 'default'],
            ['id_eventtype6', 'default'],
            ['id_eventtype7', 'default'],
            ['id_eventtype8', 'default'],
            ['id_eventcomp', 'default'],
            ['comment', 'string'],
            ['id', 'integer'],
        	[['uname', 'id_eventlevel', 'id_coordinator', 'location', 'startdate', 'finishdate', 'id_activity0','id_activity1','id_activity2','id_activity3','id_eventtype0','id_eventtype1','id_eventtype2','id_eventtype3','id_eventtype4','id_eventtype5','id_eventtype6','id_eventtype7','id_eventtype8', 'id_eventcomp', 'comment', 'id'], 'required', 'when' => function () {
                    if (!$this->uname && !$this->id_eventlevel && !$this->coordinator && !$this->location && !$this->startdate && !$this->finishdate && !$this->id_activity0 && !$this->id_activity1 && !$this->id_activity2 && !$this->id_activity3 && !$this->id_eventtype0 && !$this->id_eventtype1 && !$this->id_eventtype2 && !$this->id_eventtype3 && !$this->id_eventtype4 && !$this->id_eventtype5 && !$this->id_eventtype6 && !$this->id_eventtype7 && !$this->id_eventtype8 && !$this->id_eventcomp && !$this->comment && !$this->id) {

                    }
                }]
        ];
    }
}