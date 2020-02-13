<?php

namespace app\models;

use app\components\Tools;
use Yii;

/**
 * This is the model class for table "requirement".
 *
 * @property int $id
 * @property int $flight_group_id
 * @property int $counter_id
 * @property string $date_start
 * @property string $date_end
 *
 * @property FlightGroup $flightGroup
 * @property Counter $counter
 */
class Requirement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requirement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'flight_group_id', 'counter_id'], 'integer'],
            [['date_start', 'date_end', 'flight_group_id'], 'required'],
            [['date_start', 'date_end'], function ($attribute, $params, $validator) {
                $start = date_create($this->date_start);
                $end = date_create($this->date_end);
                if ($start->format('d') !== $end->format('d')) {
                    $this->addError('date_start', 'must be at the same day as end date');
                    $this->addError('date_end', 'must be at the same day as start date');
                    return;
                }
                if ($start > $end) {
                    $this->addError('date_start', 'must be smaller than end date');
                    $this->addError('date_end', 'must be higher than start date');
                }
            }],
            [['id'], 'unique'],
            [['is_deleted'], 'boolean'],
            [['flight_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => FlightGroup::className(), 'targetAttribute' => ['flight_group_id' => 'id']],
            [['counter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Counter::className(), 'targetAttribute' => ['counter_id' => 'id']],
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
            'counter_id' => 'Counter ID',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
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
    public function getCounter()
    {
        return $this->hasOne(Counter::className(), ['id' => 'counter_id']);
    }

    /**
     * @inheritdoc
     * @return RequirementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequirementQuery(get_called_class());
    }
}
