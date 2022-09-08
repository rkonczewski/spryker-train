<?php

namespace Pyz\Yves\PlanetWidget;

use Pyz\Client\Planet\PlanetClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException;

class PlanetWidgetFactory extends AbstractFactory
{
    /**
     * @return PlanetClientInterface
     * @throws ContainerKeyNotFoundException
     */
    public function getPlanetClient(): PlanetClientInterface
    {
        return $this->getProvidedDependency(PlanetWidgetDependencyProvider::CLIENT_PLANET);
    }
}

