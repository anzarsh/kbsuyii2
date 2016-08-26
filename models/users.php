<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\event_user_status_role;

class users extends ActiveRecord
{
	public function getRoles()
    {
        return $this->hasOne(event_user_status_role::className(), ['id_user' => 'id']);
        		// ->where(['id' => $role]);
            
    }
}
