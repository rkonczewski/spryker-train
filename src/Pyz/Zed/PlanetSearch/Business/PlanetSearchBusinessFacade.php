<?php

namespace Pyz\Zed\PlanetSearch\Business;

use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Kernel\Business\AbstractFacade;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

/**
 * @method \Pyz\Zed\PlanetSearch\Business\PlanetSearchBusinessFactory getFactory()
 */
class PlanetSearchBusinessFacade extends AbstractFacade implements PlanetSearchBusinessFacadeInterface
{
    /**
     * @param int $idPlanet
     * @return void
     * @throws AmbiguousComparisonException
     * @throws PropelException
     */
    public function publish(int $idPlanet): void
    {
        $this->getFactory()
            ->createPlanetSearchWriter()
            ->publish($idPlanet);
    }
}
