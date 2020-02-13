<?php

namespace app\models;
use app\components\extensions\AppModelQuery;

/**
 * This is the ActiveQuery class for [[FlightGroupZone]].
 *
 * @see FlightGroupZone
 */
class FlightGroupZoneQuery extends AppModelQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function active()
    {
        return $this->andWhere('[[flight_group_zone.is_deleted]]=0');
    }

    /**
     * @inheritdoc
     * @return FlightGroupZone[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FlightGroupZone|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
