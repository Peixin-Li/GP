<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $task_name
 * @property string $remark
 * @property string $status
 * @property integer $issuer_id
 * @property string $start_day
 * @property string $end_day
 * @property string $chk_item
 * @property string $list_order
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['issuer_id'], 'integer'],
            [['start_day', 'end_day'], 'safe'],
            [['task_name', 'chk_item'], 'string', 'max' => 100],
            [['remark'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 30],
            [['list_order'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '任务ID',
            'task_name' => '任务名称',
            'remark' => '任务描述',
            'status' => '任务状态',
            'issuer_id' => '任务创建者ID',
            'start_day' => '任务开始时间',
            'end_day' => '任务结束时间',
            'chk_item' => '检查项',
            'list_order' => '所在项目列表序号',
        ];
    }
}
