<?php

namespace Pyz\Client\PlanetsRestApi;

use Generated\Shared\Transfer\PlanetCollectionTransfer;

interface PlanetsRestApiClientInterface
{
    /**
     * @param PlanetCollectionTransfer $planetCollectionTransfer
     * @return PlanetCollectionTransfer
     */
    public function getPlanetCollection(PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer;
}
