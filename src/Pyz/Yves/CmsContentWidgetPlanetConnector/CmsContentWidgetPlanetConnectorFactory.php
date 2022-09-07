<?php

namespace Pyz\Yves\CmsContentWidgetPlanetConnector;

use Pyz\Client\Planet\PlanetClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException;

class CmsContentWidgetPlanetConnectorFactory extends AbstractFactory
{
    /**
     * @return PlanetClientInterface
     * @throws ContainerKeyNotFoundException
     */
    public function getPlanetClient(): PlanetClientInterface
    {
        return $this->getProvidedDependency(CmsContentWidgetPlanetConnectorDependencyProvider::CLIENT_PLANET);
    }
}
