<?php

namespace app\models;

use app\components\extensions\AppModelQuery;

/**
 * This is the ActiveQuery class for [[Requirement]].
 *
 * @see Requirement
 */
class RequirementQuery extends AppModelQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function active()
    {
        return $this->andWhere('[[requirement.is_deleted]]=0');
    }

    /**
     * @inheritdoc
     * @return Requirement[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }


    /**
     * @inheritdoc
     * @return Requirement|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function onDate($date)
    {
        return $this->andWhere(['=', 'date(date_start)', $date])->innerJoinWith('flightGroup');
    }
}
