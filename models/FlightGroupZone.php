<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flight_group_zone".
 *
 * @property int $id
 * @property int $flight_group_id
 * @property int $zone_id
 * @property int $points
 *
 * @property FlightGroup $flightGroup
 * @property Zone $zone
 */
class FlightGroupZone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flight_group_zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'flight_group_id', 'zone_id', 'points'], 'integer'],
            [['points'], 'number', 'min' => 0],
            [['id'], 'unique'],
            [['is_deleted'], 'boolean'],
            [['flight_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => FlightGroup::className(), 'targetAttribute' => ['flight_group_id' => 'id']],
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
            'flight_group_id' => 'Flight Group ID',
            'zone_id' => 'Zone ID',
            'points' => 'Points',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlightGroup()
    {
        return $this->hasOne(FlightGroup::className(), ['id' => 'flight_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZone()
    {
        return $this->hasOne(Zone::className(), ['id' => 'zone_id']);
    }

    /**
     * @inheritdoc
     * @return FlightGroupZoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FlightGroupZoneQuery(get_called_class());
    }
}
