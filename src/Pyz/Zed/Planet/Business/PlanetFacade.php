<?php

namespace Pyz\Zed\Planet\Business;

use Generated\Shared\Transfer\PlanetTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\Planet\Business\PlanetBusinessFactory getFactory()
 * * @method \Pyz\Zed\Planet\Persistence\PlanetEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\Planet\Persistence\PlanetRepositoryInterface getRepository()
 */
class PlanetFacade extends AbstractFacade implements PlanetFacadeInterface
{
    /**
     * @param PlanetTransfer $planetTransfer
     * @return PlanetTransfer
     */
    public function createPlanetEntity(PlanetTransfer $planetTransfer): PlanetTransfer
    {
        return $this->getFactory()->createPlanet()->createPlanetEntity($planetTransfer);
    }
}
