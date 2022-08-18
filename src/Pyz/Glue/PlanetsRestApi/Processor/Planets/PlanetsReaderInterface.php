<?php

namespace Pyz\Glue\PlanetsRestApi\Processor\Planets;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface PlanetsReaderInterface
{
    /**
     * @param RestRequestInterface $restRequest
     * @return RestResponseInterface
     */
    public function getPlanets(RestRequestInterface $restRequest): RestResponseInterface;
}
