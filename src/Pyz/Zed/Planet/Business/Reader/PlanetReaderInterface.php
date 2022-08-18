<?php

namespace Pyz\Zed\Planet\Business\Reader;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetReaderInterface
{
    /**
     * @param $idPlanet
     * @return PlanetTransfer|null
     */
    public function findPlanetById($idPlanet): ?PlanetTransfer;

    /**
     * @return PlanetCollectionTransfer
     */
    public function getAllPlanetCollection(): PlanetCollectionTransfer;
}
