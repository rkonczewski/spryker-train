<?php

namespace Pyz\Zed\Planet\Business\Deleter;

use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetDeleterInterface
{
    /**
     * @param PlanetTransfer $planetTransfer
     * @return mixed
     */
    public function deletePlanetEntity(PlanetTransfer $planetTransfer);
}
