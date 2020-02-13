<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flight_group".
 *
 * @property int $id
 * @property bool $planned
 * @property string $name
 *
 * @property FlightGroupZone[] $flightGroupZones
 * @property Requirement[] $requirements
 */
class FlightGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flight_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id'], 'integer'],
            [['planned','is_deleted'], 'boolean'],
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
            'planned' => 'Planned',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlightGroupZones()
    {
        return $this->hasMany(FlightGroupZone::className(), ['flight_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirements()
    {
        return $this->hasMany(Requirement::className(), ['flight_group_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return FlightGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FlightGroupQuery(get_called_class());
    }
}
