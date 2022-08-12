<?php

namespace Pyz\Zed\Planet\Persistence;

use Orm\Zed\Planet\Persistence\PyzPlanetQuery;

class PlanetPersistenceFactory
{
    /**
     * @return PyzPlanetQuery
     */
    public function createPlanetQuery(): PyzPlanetQuery
    {
        return PyzPlanetQuery::create();
    }
}
