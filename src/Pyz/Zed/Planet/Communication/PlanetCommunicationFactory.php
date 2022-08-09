<?php

namespace Pyz\Zed\Planet\Communication;

use Orm\Zed\Planet\Persistence\Map\PyzPlanetTableMap;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Pyz\Zed\Planet\Communication\Table\PlanetTable;
use Pyz\Zed\Planet\PlanetDependencyProvider;
use Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException;

class PlanetCommunicationFactory extends \Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory
{
    /**
     * @return PlanetTable
     */
    public function createPlanetTable(): PlanetTable
    {
        return new PlanetTable($this->getPlanetPropelQuery());
    }

    /**
     * @return PyzPlanetQuery
     * @throws ContainerKeyNotFoundException
     */
    private function getPlanetPropelQuery(): PyzPlanetQuery
    {
        return $this->getProvidedDependency(PlanetDependencyProvider::QUERY_PLANET);
    }
}
