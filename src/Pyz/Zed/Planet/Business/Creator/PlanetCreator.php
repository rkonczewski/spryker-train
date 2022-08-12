<?php

namespace Pyz\Zed\Planet\Business\Creator;

use Generated\Shared\Transfer\PlanetTransfer;
use Pyz\Zed\Planet\Persistence\PlanetEntityManagerInterface;

class PlanetCreator implements PlanetCreatorInterface
{
    /**
     * @var PlanetEntityManagerInterface
     */
    protected $planetEntityManager;

    /**
     * @param PlanetEntityManagerInterface $planetEntityManager
     */
    public function __construct(PlanetEntityManagerInterface $planetEntityManager)
    {
        $this->planetEntityManager = $planetEntityManager;
    }

    /**
     * @param PlanetTransfer $planetTransfer
     * @return PlanetTransfer
     */
    public function createPlanetEntity(PlanetTransfer $planetTransfer): PlanetTransfer
    {
        return $this->planetEntityManager->savePlanetEntity($planetTransfer);
    }
}
