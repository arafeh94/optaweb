<?php

namespace app\models;
use app\components\extensions\AppModelQuery;
/**
 * This is the ActiveQuery class for [[Zone]].
 *
 * @see Zone
 */
class ZoneQuery extends AppModelQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function active()
    {
        return $this->andWhere('[[zone.is_deleted]]=0');
    }

    /**
     * @inheritdoc
     * @return Zone[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Zone|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
