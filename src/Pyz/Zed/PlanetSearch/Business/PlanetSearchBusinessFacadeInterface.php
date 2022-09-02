<?php

namespace Pyz\Zed\PlanetSearch\Business;

interface PlanetSearchBusinessFacadeInterface
{
    /**
     * @param int $idPlanet
     * @return void
     */
    public function publish(int $idPlanet): void;
}
