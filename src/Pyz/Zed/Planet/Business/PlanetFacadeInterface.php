<?php

namespace Pyz\Zed\Planet\Business;

use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetFacadeInterface
{
    /**
     * @param PlanetTransfer $planetTransfer
     * @return PlanetTransfer
     */
    public function createPlanetEntity(PlanetTransfer $planetTransfer): PlanetTransfer;
}
