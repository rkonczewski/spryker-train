<?php

namespace Pyz\Zed\PlanetSearch\Business;

use Pyz\Zed\PlanetSearch\Business\Writer\PlanetSearchWriter;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class PlanetSearchBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return PlanetSearchWriter
     */
    public function createPlanetSearchWriter()
    {
        return new PlanetSearchWriter();
    }
}
