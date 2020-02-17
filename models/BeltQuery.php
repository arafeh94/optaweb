<?php

namespace app\models;
use app\components\extensions\AppModelQuery;

/**
 * This is the ActiveQuery class for [[Belt]].
 *
 * @see Belt
 */
class BeltQuery extends AppModelQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Belt[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Belt|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
