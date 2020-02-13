<?php

namespace app\models;
use app\components\extensions\AppModelQuery;


/**
 * This is the ActiveQuery class for [[Counter]].
 *
 * @see Counter
 */
class CounterQuery extends AppModelQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function active()
    {
        return $this->andWhere('[[counter.is_deleted]]=0');
    }

    /**
     * @inheritdoc
     * @return Counter[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Counter|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
