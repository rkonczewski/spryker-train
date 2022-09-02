<?php

namespace Pyz\Zed\PlanetSearch\Business\Writer;

interface PlanetSearchWriterInterface
{
    /**
     * @param int $idPlanet
     * @return void
     */
    public function publish(int $idPlanet): void;

}
