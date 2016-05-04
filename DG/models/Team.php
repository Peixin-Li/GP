<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $team_name
 * @property integer $leader_id
 * @property string $built_time
 * @property string $labels
 * @property string $team_visible
 * @property string $team_intro
 * @property string $imagePath
 * @property string $phone
 * @property string $email
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['team_name', 'leader_id', 'built_time', 'team_intro'], 'required'],
            [['leader_id'], 'integer'],
            [['built_time'], 'safe'],
            [['team_name'], 'string', 'max' => 30],
            [['labels', 'team_intro'], 'string', 'max' => 100],
            [['team_visible'], 'string', 'max' => 10],
            [['imagePath', 'phone', 'email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '团队ID',
            'team_name' => '团队名称',
            'leader_id' => '团队负责人ID',
            'built_time' => '团队创建时间',
            'labels' => '团队标签',
            'team_visible' => '团队是否对外可见',
            'team_intro' => '团队简介',
            'imagePath' => '团队头像路径',
            'phone' => '团队电话',
            'email' => '团队邮箱',
        ];
    }
}
