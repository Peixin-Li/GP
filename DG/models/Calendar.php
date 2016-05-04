<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property integer $id
 * @property string $title
 * @property string $start
 * @property string $end
 * @property integer $allDay
 * @property string $color
 * @property string $type
 * @property integer $own_id
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'start', 'type', 'own_id'], 'required'],
            [['start', 'end'], 'safe'],
            [['allDay', 'own_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['color', 'type'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '日程ID',
            'title' => '日程主题',
            'start' => '日程开始时间',
            'end' => '日程结束时间',
            'allDay' => '日程是否持续一天',
            'color' => '日程标签颜色',
            'type' => '日程持有者类型：user，project，team',
            'own_id' => '日程持有者id',
        ];
    }
}
