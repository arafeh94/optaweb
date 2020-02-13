<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "counter".
 *
 * @property int $id
 * @property int $zone_id
 * @property int $proximity
 * @property string $unavailabilityPeriodStartTime
 * @property string $unavailabilityPeriodEndTime
 *
 * @property Zone $zone
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
            [['id', 'zone_id', 'proximity'], 'integer'],
            [['is_deleted'], 'boolean'],
            [['unavailabilityPeriodStartTime', 'unavailabilityPeriodEndTime'], 'safe'],
            [['id'], 'unique'],
            [['zone_id'], 'exist', 'skipOnError' => true, 'targetClass' => Zone::className(), 'targetAttribute' => ['zone_id' => 'id']],
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
            'unavailabilityPeriodStartTime' => 'Unavailability Period Start Time',
            'unavailabilityPeriodEndTime' => 'Unavailability Period End Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZone()
    {
        return $this->hasOne(Zone::className(), ['id' => 'zone_id']);
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
