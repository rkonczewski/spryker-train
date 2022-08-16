<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetTransfer;
use Orm\Zed\Planet\Persistence\PyzPlanet;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method PlanetPersistenceFactory getFactory()
 */
class PlanetEntityManager extends AbstractEntityManager implements PlanetEntityManagerInterface
{
    /**
     * @param PlanetTransfer $planetTransfer
     * @return PlanetTransfer
     * @throws PropelException
     */
    public function savePlanetEntity(PlanetTransfer $planetTransfer): PlanetTransfer
    {
        $planetEntity = $this->CreatePyzPlanetQuery()
            ->filterByIdPlanet($planetTransfer->getIdPlanet())
            ->findOneOrCreate();
        $planetEntity->fromArray($planetTransfer->toArray());
        $planetEntity->save();
        $planetTransfer->fromArray($planetEntity->toArray());

        return $planetTransfer;
    }

    /**
     * @return PyzPlanetQuery
     */
    private function createPyzPlanetQuery(): PyzPlanetQuery
    {
        return PyzPlanetQuery::create();
    }
}
