<?php

namespace app\models;
use app\components\extensions\AppModelQuery;

/**
 * This is the ActiveQuery class for [[Conjunction]].
 *
 * @see Conjunction
 */
class ConjunctionQuery extends AppModelQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Conjunction[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Conjunction|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
