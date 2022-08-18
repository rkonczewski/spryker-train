<?php

namespace Pyz\Client\PlanetsRestApi;

use Pyz\Client\PlanetsRestApi\Zed\PlanetsRestApiZedStub;
use Pyz\Client\PlanetsRestApi\Zed\PlanetsRestApiZedStubInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;


class PlanetsRestApiFactory extends AbstractFactory
{
    /**
     * @return PlanetsRestApiZedStubInterface
     * @throws ContainerKeyNotFoundException
     */
    public function createPlanetZedStub(): PlanetsRestApiZedStubInterface
    {
        return new PlanetsRestApiZedStub($this->getZedRequestClient());
    }

    /**
     * @return ZedRequestClientInterface
     * @throws ContainerKeyNotFoundException
     */
    protected function getZedRequestClient(): ZedRequestClientInterface
    {
        return $this->getProvidedDependency(PlanetsRestApiDependencyProvider::CLIENT_ZED_REQUEST);
    }
}

