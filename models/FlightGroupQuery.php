<?php

namespace app\models;
use app\components\extensions\AppModelQuery;

/**
 * This is the ActiveQuery class for [[FlightGroup]].
 *
 * @see FlightGroup
 */
class FlightGroupQuery extends AppModelQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/
    public function active()
    {
        return $this->andWhere('[[flight_group.is_deleted]]=0');
    }
    /**
     * @inheritdoc
     * @return FlightGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FlightGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
