<?php

namespace Pyz\Zed\Planet\Business\Creator;

use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetCreatorInterface
{
    /**
     * @param PlanetTransfer $planetTransfer
     * @return PlanetTransfer
     */
    public function createPlanetEntity(PlanetTransfer $planetTransfer): PlanetTransfer;
}
