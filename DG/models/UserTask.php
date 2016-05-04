<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_task".
 *
 * @property integer $id
 * @property integer $task_id
 * @property integer $user_id
 * @property integer $list_order
 */
class UserTask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'user_id'], 'required'],
            [['task_id', 'user_id', 'list_order'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '表ID',
            'task_id' => '任务ID',
            'user_id' => '用户ID',
            'list_order' => '任务所属任务列表',
        ];
    }
}
