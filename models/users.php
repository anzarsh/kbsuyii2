<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\event_user_status_role;
use app\models\department;
use app\models\groups;
use app\models\group_user;

class users extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }
	public function getDepartment()
    {
        return $this->hasOne(department::className(), ['id' => 'id_department'])
        				->with('unit');
    }
    public function getGroups()
    {
        return $this->hasMany(groups::className(), ['id' => 'id_group'])
        		->viaTable('group_user', ['id_user' => 'id']);
    }
    public function getEvents()
    {
        return $this->hasMany(event_user_status_role::className(), ['id_user' => 'id'])
                        ->with('role')->with('event');//->orderBy('event.id');
    }
}
