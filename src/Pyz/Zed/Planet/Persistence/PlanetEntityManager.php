<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetTransfer;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

/**
 * @method PlanetPersistenceFactory getFactory()
 */
class PlanetEntityManager extends AbstractEntityManager implements PlanetEntityManagerInterface
{
    /**
     * @param PlanetTransfer $planetTransfer
     * @return PlanetTransfer
     * @throws PropelException|AmbiguousComparisonException
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
     * @param PlanetTransfer $planetTransfer
     * @return void
     * @throws AmbiguousComparisonException
     * @throws PropelException
     */
    public function deletePlanetEntity(PlanetTransfer $planetTransfer): void
    {
        $planetEntity = $this
            ->createPyzPlanetQuery()
            ->filterByIdPlanet($planetTransfer->getIdPlanet());
        $planetEntity->delete();
    }

    /**
     * @return PyzPlanetQuery
     */
    private function createPyzPlanetQuery(): PyzPlanetQuery
    {
        return PyzPlanetQuery::create();
    }
}
