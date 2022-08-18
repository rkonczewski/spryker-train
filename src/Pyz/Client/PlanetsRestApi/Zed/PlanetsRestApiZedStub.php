<?php

namespace Pyz\Client\PlanetsRestApi\Zed;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class PlanetsRestApiZedStub implements PlanetsRestApiZedStubInterface
{
    /**
     * @var ZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param PlanetCollectionTransfer $planetCollectionTransfer
     * @return PlanetCollectionTransfer
     */
    public function getPlanetCollection(PlanetCollectionTransfer $planetCollectionTransfer): PlanetCollectionTransfer
    {
        /**
         * @var PlanetCollectionTransfer $planetCollectionTransfer
         */
        $planetCollectionTransfer = $this->zedRequestClient->call(
            '/planet/gateway/get-planet-collection',
            $planetCollectionTransfer
        );

        return $planetCollectionTransfer;
    }
}
