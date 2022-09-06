<?php

namespace Pyz\Zed\PlanetSearch\Business\Writer;

use Generated\Shared\Transfer\PlanetTransfer;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Orm\Zed\PlanetSearch\Persistence\PyzPlanetSearchQuery;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

class PlanetSearchWriter implements PlanetSearchWriterInterface
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
            ->filterByIdPlanet($idPlanet)
            ->findOne();

        $planetTransfer = new PlanetTransfer();
        $planetTransfer->fromArray($planetEntity->toArray());

        $searchEntity = PyzPlanetSearchQuery::create()
            ->filterByFkPlanet($idPlanet)
            ->findOneOrCreate();
        $searchEntity->setFkPlanet($idPlanet);
        $searchEntity->setData($planetTransfer->toArray());

        $searchEntity->save();
    }
}
