<?php

namespace Pyz\Glue\PlanetsRestApi;

use Pyz\Glue\PlanetsRestApi\Processor\Mapper\PlanetsResourceMapper;
use Pyz\Glue\PlanetsRestApi\Processor\Planets\PlanetsReader;
use Pyz\Glue\PlanetsRestApi\Processor\Planets\PlanetsReaderInterface;
use Spryker\Glue\Kernel\AbstractFactory;

/**
 * @method \Pyz\Client\PlanetsRestApi\PlanetsRestApiClientInterface getClient()
 */
class PlanetsRestApiFactory extends AbstractFactory
{
    /**
     * @return PlanetsResourceMapper
     */
    public function createPlanetsResourceMapper(): PlanetsResourceMapper
    {
        return new PlanetsResourceMapper();
    }

    /**
     * @return PlanetsReaderInterface
     */
    public function createPlanetsReader(): PlanetsReaderInterface
    {
        return new PlanetsReader(
            $this->getClient(),
            $this->getResourceBuilder(),
            $this->createPlanetsResourceMapper(),
        );
    }
}
