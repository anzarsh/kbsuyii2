<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\users;
use app\models\event;
use app\models\role;
use app\models\status;

class event_user_status_role extends ActiveRecord
{
	public function getRole()
    {
        return $this->hasOne(role::className(), ['id' => 'id_role']);
    }
    public function getUser()
    {
        return $this->hasOne(users::className(), ['id' => 'id_user'])
                        ->with('department');
    }
    public function getEvent()
    {
        return $this->hasOne(event::className(), ['id' => 'id_event']);
    }
}