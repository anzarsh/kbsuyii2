<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\users;
use app\models\group_user;

class groups extends ActiveRecord
{
	public function getNumber()
    {
        return $this->hasMany(group_user::className(), ['id_group' => 'id']);
    }
    public function getUsers()
    {
        return $this->hasMany(users::className(), ['id' => 'id_user'])
	        ->viaTable('group_user', ['id_group' => 'id']);
    }
}