<?php

namespace Pyz\Zed\Planet\Business\Reader;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;
use Pyz\Zed\Planet\Persistence\PlanetRepositoryInterface;

class PlanetReader implements PlanetReaderInterface
{
    /**
     * @var PlanetRepositoryInterface
     */
    private PlanetRepositoryInterface $planetRepository;

    /**
     * @param PlanetRepositoryInterface $planetRepository
     */
    public function __construct(PlanetRepositoryInterface $planetRepository)
    {
        $this->planetRepository = $planetRepository;
    }

    /**
     * @param $idPlanet
     * @return PlanetTransfer
     */
    public function findPlanetById($idPlanet): PlanetTransfer
    {
        return $this->planetRepository->findPlanetById($idPlanet);
    }

    /**
     * @return PlanetCollectionTransfer
     */
    public function getAllPlanetCollection(): PlanetCollectionTransfer
    {
        return $this->planetRepository->findAllPlanetCollection();
    }
}
