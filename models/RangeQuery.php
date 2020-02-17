<?php

namespace app\models;
use app\components\extensions\AppModelQuery;

/**
 * This is the ActiveQuery class for [[Range]].
 *
 * @see Range
 */
class RangeQuery extends AppModelQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Range[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Range|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
