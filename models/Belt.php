<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "belt".
 *
 * @property int $id
 * @property double $ratio_bag_per_timeunit
 * @property string $name
 * @property bool $is_deleted
 *
 * @property Conjunction[] $parents
 * @property Conjunction[] $children
 * @property Counter[] $counters
 */
class Belt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'belt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ratio_bag_per_timeunit'], 'number'],
            [['name'], 'safe'],
            [['is_deleted'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ratio_bag_per_timeunit' => 'Ratio Bag Per Timeunit',
            'name' => 'Name',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Conjunction::className(), ['belt_id_child' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(Conjunction::className(), ['belt_id_parent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCounters()
    {
        return $this->hasMany(Counter::className(), ['belt_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return BeltQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BeltQuery(get_called_class());
    }
}
