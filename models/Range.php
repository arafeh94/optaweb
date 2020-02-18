<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "range".
 *
 * @property int $id
 * @property int $zone_id
 * @property int $position_in_zone
 * @property bool $is_deleted
 *
 * @property Counter[] $counters
 * @property Zone $zone
 */
class Range extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'range';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zone_id', 'position_in_zone'], 'integer'],
            [['is_deleted'], 'boolean'],
            [['zone_id'], 'exist', 'skipOnError' => true, 'targetClass' => Zone::className(), 'targetAttribute' => ['zone_id' => 'id']],
            [['position_in_zone', 'zone_id'], 'unique', 'targetAttribute' => ['position_in_zone'], 'message' => 'Position already assigned']
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
            'position_in_zone' => 'Position In Zone',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCounters()
    {
        return $this->hasMany(Counter::className(), ['range_id' => 'id']);
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
     * @return RangeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RangeQuery(get_called_class());
    }
}
