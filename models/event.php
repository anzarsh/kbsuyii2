<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\eventlevel;
use app\models\eventtype;
use app\models\users;
use app\models\event_user_status;
use app\models\event_eventtype;

class event extends ActiveRecord
{
    public function getEventlevel()
    {
        return $this->hasOne(eventlevel::className(), ['id' => 'id_eventlevel']);
    }
    public function getICoordinator()
    {
    	return $this->hasOne(users::className(), ['id' => 'coordinator']);
    }
    public function getUsers()
    {
        return $this->hasMany(users::className(), ['id' => 'id_user'])
            ->viaTable('event_user_status', ['id_event' => 'id']);
    }
    public function getEventtype()
    {
        return $this->hasMany(eventtype::className(), ['id' => 'id_eventtype'])
            ->viaTable('event_eventtype', ['id_event' => 'id']);
    }
    public function getActivity()
    {
        return $this->hasMany(activity::className(), ['id' => 'id_activity'])
            ->viaTable('event_activity', ['id_event' => 'id']);
    }
    public function getComp()
    {
        return $this->hasOne(eventcomp::className(), ['id' => 'id_eventcomp']);
    }
}