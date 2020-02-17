<?php

namespace app\models;
use app\components\extensions\AppModelQuery;

/**
 * This is the ActiveQuery class for [[Terminal]].
 *
 * @see Terminal
 */
class TerminalQuery extends AppModelQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Terminal[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Terminal|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
