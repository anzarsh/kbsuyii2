<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\unit;

class department extends ActiveRecord
{
	public function getUnit()
    {
        return $this->hasOne(unit::className(), ['id' => 'id_unit']);
    }
}