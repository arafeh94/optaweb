<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conjunction".
 *
 * @property int $id
 * @property int $belt_id_parent
 * @property int $belt_id_child
 * @property bool $is_deleted
 *
 * @property Belt $childBelt
 * @property Belt $parentBelt
 */
class Conjunction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conjunction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['belt_id_parent', 'belt_id_child'], 'integer'],
            [['is_deleted'], 'boolean'],
            [['belt_id_child'], 'exist', 'skipOnError' => true, 'targetClass' => Belt::className(), 'targetAttribute' => ['belt_id_child' => 'id']],
            [['belt_id_parent'], 'exist', 'skipOnError' => true, 'targetClass' => Belt::className(), 'targetAttribute' => ['belt_id_parent' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'belt_id_parent' => 'Belt Id Parent',
            'belt_id_child' => 'Belt Id Child',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildBelt()
    {
        return $this->hasOne(Belt::className(), ['id' => 'belt_id_child']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentBelt()
    {
        return $this->hasOne(Belt::className(), ['id' => 'belt_id_parent']);
    }

    /**
     * @inheritdoc
     * @return ConjunctionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConjunctionQuery(get_called_class());
    }
}
