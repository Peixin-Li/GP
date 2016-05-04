<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $proj_name
 * @property integer $leader_id
 * @property string $built_time
 * @property string $proj_visible
 * @property string $proj_intro
 * @property string $start_day
 * @property string $end_day
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['proj_name', 'built_time', 'proj_visible'], 'required'],
            [['leader_id'], 'integer'],
            [['built_time', 'start_day', 'end_day'], 'safe'],
            [['proj_name'], 'string', 'max' => 30],
            [['proj_visible'], 'string', 'max' => 10],
            [['proj_intro'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '项目ID',
            'proj_name' => '项目名称',
            'leader_id' => '项目负责人ID',
            'built_time' => '项目创建时间',
            'proj_visible' => '项目是否对外可见',
            'proj_intro' => '项目简介',
            'start_day' => '项目开始时间',
            'end_day' => '项目结束时间',
        ];
    }
}
