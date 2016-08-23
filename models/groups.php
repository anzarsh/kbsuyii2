<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\users;

class groups extends ActiveRecord
{
	public function getNum()
    {
        return $this->hasMany(users::className(), ['id_group' => 'id']);
    }
}