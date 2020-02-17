<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "terminal".
 *
 * @property int $id
 * @property string $name
 * @property bool $is_deleted
 *
 * @property Zone[] $zones
 */
class Terminal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'terminal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
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
            'name' => 'Name',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZones()
    {
        return $this->hasMany(Zone::className(), ['terminal_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TerminalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TerminalQuery(get_called_class());
    }
}
