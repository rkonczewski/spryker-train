<?php

namespace Pyz\Zed\Planet\Business\Reader;

use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetReaderInterface
{
    /**
     * @param $idPlanet
     * @return PlanetTransfer|null
     */
    public function findPlanetById($idPlanet): ?PlanetTransfer;
}
