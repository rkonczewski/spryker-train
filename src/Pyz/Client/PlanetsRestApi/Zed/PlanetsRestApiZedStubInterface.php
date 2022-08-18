<?php

namespace Pyz\Client\PlanetsRestApi\Zed;

use Generated\Shared\Transfer\PlanetCollectionTransfer;

interface PlanetsRestApiZedStubInterface
{
    /**
     * @param PlanetCollectionTransfer $planetCollectionTransfer
     * @return PlanetCollectionTransfer
     */
    public function getPlanetCollection(PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer;
}
