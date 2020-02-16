<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zone".
 *
 * @property int $id
 * @property int $terminal_id
 * @property string $name
 *
 * @property Terminal $terminal
 * @property Counter[] $counters
 * @property FlightGroupZone[] $flightGroupZones
 */
class Zone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'terminal_id','max_passenger'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'max_passenger' => 'Max Passenger'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerminal()
    {
        return $this->hasOne(Terminal::className(), ['id' => 'terminal_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCounters()
    {
        return $this->hasMany(Counter::className(), ['zone_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlightGroupZones()
    {
        return $this->hasMany(FlightGroupZone::className(), ['zone_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ZoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ZoneQuery(get_called_class());
    }
}
