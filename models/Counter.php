<?php

namespace app\models;

use app\components\Tools;
use Yii;

/**
 * This is the model class for table "counter".
 *
 *
 * @property int id
 * @property string unavailabilityPeriodStartTime
 * @property string unavailabilityPeriodEndTime
 * @property float ratio_passenger_per_timeunit
 * @property int proximity
 * @property int total_passengers
 *
 * @property Range $range
 * @property Belt $belt
 * @property Requirement[] $requirements
 */
class Counter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'counter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'range_id', 'belt_id', 'proximity','total_passengers','ratio_passenger_per_timeunit'], 'integer'],
            [['is_deleted'], 'boolean'],
            [['unavailabilityPeriodStartTime', 'unavailabilityPeriodEndTime', 'proximity', 'ratio_passenger_per_timeunit', 'total_passengers'], 'safe'],
            [['range_id'], 'exist', 'skipOnError' => true, 'targetClass' => Range::className(), 'targetAttribute' => ['range_id' => 'id']],
            [['belt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Belt::className(), 'targetAttribute' => ['belt_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zone_id' => 'Zone ID',
            'proximity' => 'Proximity',
            'ratio_passenger_per_timeunit' => 'Ratio Passenger Per TimeUnit',
            'total_passengers' => 'Total Passenger',
            'unavailabilityPeriodStartTime' => 'Unavailability Period Start Time',
            'unavailabilityPeriodEndTime' => 'Unavailability Period End Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRange()
    {
        return $this->hasOne(Range::className(), ['id' => 'range_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBelt()
    {
        return $this->hasOne(Belt::className(), ['id' => 'belt_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirements()
    {
        return $this->hasMany(Requirement::className(), ['counter_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CounterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CounterQuery(get_called_class());
    }
}
