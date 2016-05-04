<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apply".
 *
 * @property integer $user_id
 * @property integer $team_id
 * @property integer $type
 */
class Apply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'team_id', 'type'], 'required'],
            [['user_id', 'team_id', 'type'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '用户ID',
            'team_id' => '团队ID',
            'type' => '申请类型:1用户申请加入团队；2团队邀请用户加入。',
        ];
    }
}
