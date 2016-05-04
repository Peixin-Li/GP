<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $user_name
 * @property string $account
 * @property string $gender
 * @property string $pw
 * @property integer $def_team
 * @property string $reg_day
 * @property string $intro
 * @property string $imagePath
 * @property string $labels
 * @property integer $interest
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'account', 'pw'], 'required'],
            [['def_team', 'interest'], 'integer'],
            [['reg_day'], 'safe'],
            [['user_name'], 'string', 'max' => 30],
            [['account', 'pw', 'imagePath'], 'string', 'max' => 50],
            [['gender'], 'string', 'max' => 20],
            [['intro', 'labels'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '用户ID',
            'user_name' => '用户名称',
            'account' => '用户账号',
            'gender' => '用户性别',
            'pw' => '用户密码',
            'def_team' => '用户设置的默认团队',
            'reg_day' => '用户注册时间',
            'intro' => '用户简介',
            'imagePath' => '用户头像路径',
            'labels' => '用户标签',
            'interest' => '用户搜索热度',
        ];
    }
}
