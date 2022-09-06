<?php

namespace Pyz\Client\Planet;

use Pyz\Client\Planet\Plugin\Elasticsearch\Query\PlanetQueryPlugin;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException;

class PlanetFactory extends AbstractFactory
{
    /**
     * @param string $name
     *
     * @return PlanetQueryPlugin
     */
    public function createPlanetQueryPlugin(string $name)
    {
        return new PlanetQueryPlugin($name);
    }

    /**
     * @return array
     * @throws ContainerKeyNotFoundException
     */
    public function getSearchQueryFormatters()
    {
        return $this->getProvidedDependency(PlanetDependencyProvider::PLANET_RESULT_FORMATTER_PLUGINS);
    }

    /**
     * @return \Spryker\Client\Search\SearchClientInterface
     * @throws ContainerKeyNotFoundException
     */
    public function getSearchClient()
    {
        return $this->getProvidedDependency(PlanetDependencyProvider::CLIENT_SEARCH);
    }
}

