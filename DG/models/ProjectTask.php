<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_task".
 *
 * @property integer $id
 * @property integer $proj_id
 * @property integer $task_id
 */
class ProjectTask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['proj_id', 'task_id'], 'required'],
            [['proj_id', 'task_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '表ID',
            'proj_id' => '项目ID',
            'task_id' => '任务ID',
        ];
    }
}
