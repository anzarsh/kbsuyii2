<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\users;
use app\models\groups;

class group_user extends ActiveRecord
{
	// public function getNumber()
 //    {
 //        return $this->hasMany(users::className(), ['id_group' => 'id']);
 //    }
}