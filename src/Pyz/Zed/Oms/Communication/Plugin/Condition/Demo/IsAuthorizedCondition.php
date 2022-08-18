<?php

namespace Pyz\Zed\Oms\Communication\Plugin\Condition\Demo;

use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Condition\AbstractCondition;

class IsAuthorizedCondition extends AbstractCondition
{
    /**
     * @param SpySalesOrderItem $orderItem
     *
     * @return bool
     */
    public function check(SpySalesOrderItem $orderItem)
    {
        return true;
    }
}
