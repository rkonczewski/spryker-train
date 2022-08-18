<?php

namespace Pyz\Glue\PlanetsRestApi\Processor\Planets;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Pyz\Client\PlanetsRestApi\PlanetsRestApiClientInterface;
use Pyz\Glue\PlanetsRestApi\PlanetsRestApiConfig;
use Pyz\Glue\PlanetsRestApi\Processor\Mapper\PlanetsResourceMapper;
use Pyz\Glue\PlanetsRestApi\Processor\Mapper\PlanetsResourceMapperInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class PlanetsReader implements PlanetsReaderInterface
{
    /**
     * @var PlanetsRestApiClientInterface
     */
    private PlanetsRestApiClientInterface $planetsRestApiClient;

    /**
     * @var RestResourceBuilderInterface
     */
    private RestResourceBuilderInterface $restResourceBuilder;

    /**
     * @var PlanetsResourceMapper
     */
    private PlanetsResourceMapper $planetMapper;

    /**
     * @param PlanetsRestApiClientInterface $planetsRestApiClient
     * @param RestResourceBuilderInterface $restResourceBuilder
     * @param PlanetsResourceMapperInterface $planetMapper
     */
    public function __construct(
        PlanetsRestApiClientInterface $planetsRestApiClient,
        RestResourceBuilderInterface $restResourceBuilder,
        PlanetsResourceMapperInterface $planetMapper
    ) {
        $this->planetsRestApiClient = $planetsRestApiClient;
        $this->restResourceBuilder = $restResourceBuilder;
        $this->planetMapper = $planetMapper;
    }

    /**
     * @param RestRequestInterface $restRequest
     * @return RestResponseInterface
     */
    public function getPlanets(RestRequestInterface $restRequest): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $planetCollectionTransfer = $this->planetsRestApiClient->getPlanetCollection(new PlanetCollectionTransfer());

        foreach ($planetCollectionTransfer->getPlanets() as $planetTransfer) {
            $restResource = $this->restResourceBuilder->createRestResource(
                PlanetsRestApiConfig::RESOURCE_PLANETS,
                $planetTransfer->getIdPlanet(),
                $this->planetMapper->mapPlanetDataToPlanetRestAttributes($planetTransfer->toArray())
            );
            $restResponse->addResource($restResource);
        }

        return $restResponse;
    }
}
