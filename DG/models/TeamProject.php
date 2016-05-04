<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "team_project".
 *
 * @property integer $id
 * @property integer $team_id
 * @property integer $proj_id
 */
class TeamProject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team_project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['team_id', 'proj_id'], 'required'],
            [['team_id', 'proj_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '表ID',
            'team_id' => '团队ID',
            'proj_id' => '项目ID',
        ];
    }
}
