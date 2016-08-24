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
}