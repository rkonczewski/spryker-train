<?php

namespace Pyz\Zed\Planet\Business;

use Pyz\Zed\Planet\Business\Creator\PlanetCreator;
use Pyz\Zed\Planet\Business\Creator\PlanetCreatorInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\Planet\Persistence\PlanetEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\Planet\Persistence\PlanetRepositoryInterface getRepository()
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
}
