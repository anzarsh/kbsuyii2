<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\eventlevel;
use app\models\users;

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
}