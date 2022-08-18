<?php

namespace Pyz\Client\PlanetsRestApi;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Spryker\Client\Kernel\AbstractClient;
use Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException;

/**
 * @method \Pyz\Client\PlanetsRestApi\PlanetsRestApiFactory getFactory()
 */
class PlanetsRestApiClient extends AbstractClient implements PlanetsRestApiClientInterface
{
    /**
     * @param PlanetCollectionTransfer $planetCollectionTransfer
     * @return PlanetCollectionTransfer
     * @throws ContainerKeyNotFoundException
     */
    public function getPlanetCollection(PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer
    {
        return $this->getFactory()
            ->createPlanetZedStub()
            ->getplanetCollection($planetCollectionTransfer);
    }
}
