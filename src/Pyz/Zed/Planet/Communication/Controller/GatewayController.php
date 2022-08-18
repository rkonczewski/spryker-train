<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

class GatewayController extends AbstractGatewayController
{
    /**
     * @return PlanetCollectionTransfer
     */
    public function getPlanetCollectionAction(): PlanetCollectionTransfer
    {
        return $this->getFacade()->getAllPlanetEntity();
    }
}
