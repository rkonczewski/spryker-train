<?php

namespace Pyz\Zed\Planet\Business;

use Generated\Shared\Transfer\PlanetTransfer;
use Pyz\Zed\Planet\Business\Creator\PlanetCreator;
use Pyz\Zed\Planet\Business\Creator\PlanetCreatorInterface;
use Pyz\Zed\Planet\Business\Reader\PlanetReader;
use Pyz\Zed\Planet\Business\Reader\PlanetReaderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\Planet\Persistence\PlanetEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\Planet\Persistence\PlanetRepositoryInterface getRepository()
 * @method \Pyz\Zed\Planet\Business\PlanetBusinessFactory getFactory()
 */
class PlanetBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return PlanetCreatorInterface
     */
    public function createPlanet(): PlanetCreatorInterface
    {
        return new PlanetCreator($this->getEntityManager());
    }

    /**
     * @return PlanetReaderInterface
     */
    public function createPlanetReader(): PlanetReaderInterface
    {
        return new PlanetReader($this->getRepository());
    }

    /**
     * @param $idPlanet
     * @return PlanetTransfer|null
     */
    public function findPlanetById($idPlanet): ?PlanetTransfer
    {
        return $this->getFactory()
            ->createPlanetReader()
            ->findPlanetById($idPlanet);
    }
}
