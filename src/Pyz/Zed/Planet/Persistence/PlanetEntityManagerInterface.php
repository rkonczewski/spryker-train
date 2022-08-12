<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetEntityManagerInterface
{
    /**
     * @param PlanetTransfer $planetTransfer
     * @return PlanetTransfer
     */
    public function savePlanetEntity(PlanetTransfer $planetTransfer): PlanetTransfer;
}
