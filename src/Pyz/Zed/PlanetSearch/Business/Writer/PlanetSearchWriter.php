<?php

namespace Pyz\Zed\PlanetSearch\Business\Writer;

use Generated\Shared\Transfer\PlaneTransfer;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Orm\Zed\PlanetSearch\Persistence\PyzPlanetSearchQuery;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

class PlanetSearchWriter
{
    /**
     * @param int $idPlanet
     * @return void
     * @throws AmbiguousComparisonException
     * @throws PropelException
     */
    public function publish(int $idPlanet): void
    {
        $planetEntity = PyzPlanetQuery::create()
            ->filterByIdPlanet()
            ->findOne();

        $planetTransfer = new PlaneTransfer();
        $planetTransfer->fromArray($planetEntity->toArray());

        $searchEntity = PyzPlanetSearchQuery::create()
            ->filterByFkPlanet()
            ->findOneOrCreate();
        $searchEntity->setFkPlanet($idPlanet);
        $searchEntity->setData($planetTransfer->toArray());

        $searchEntity->save();
    }
}
