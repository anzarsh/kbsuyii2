<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\eventlevel;
use app\models\users;
use app\models\event_user_status;

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
    	return $this->hasMany(event_user_status::className(), ['id_event' => 'id']);
    }
}