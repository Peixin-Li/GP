<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_team".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $team_id
 */
class UserTeam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'team_id'], 'required'],
            [['user_id', 'team_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '表ID',
            'user_id' => '用户ID',
            'team_id' => '团队ID',
        ];
    }
}
