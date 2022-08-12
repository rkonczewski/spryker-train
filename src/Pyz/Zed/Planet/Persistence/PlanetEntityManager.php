<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetTransfer;
use Orm\Zed\Planet\Persistence\PyzPlanet;
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
        $planetEntity = new PyzPlanet();
        $planetEntity->fromArray($planetTransfer->modifiedToArray());
        $planetEntity->save();
        $planetTransfer->fromArray($planetEntity->toArray(), true);

        return $planetTransfer;
    }
}
