<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetRepositoryInterface
{
    /**
     * @param $idPlanet
     * @return PlanetTransfer|null
     */
    public function findPlanetById($idPlanet): ?PlanetTransfer;
}
