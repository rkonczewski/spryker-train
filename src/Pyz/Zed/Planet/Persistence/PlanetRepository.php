<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetTransfer;
use Orm\Zed\Planet\Persistence\PyzPlanet;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

class PlanetRepository extends AbstractRepository implements PlanetRepositoryInterface
{
    /**
     * @param $idPlanet
     * @return PlanetTransfer|null
     */
    public function findPlanetById($idPlanet): ?PlanetTransfer
    {
        $planetEntity = $this->createPyzPlanetQuery()->findOneByIdPlanet($idPlanet);
        if (!$planetEntity) {
            return null;
        }
        return $this->mapEntityToTransfer($planetEntity);
    }

    /**
     * @return PyzPlanetQuery
     */
    private function createPyzPlanetQuery(): PyzPlanetQuery
    {
        return PyzPlanetQuery::create();
    }

    /**
     * @param PyzPlanet $planetEntity
     * @return PlanetTransfer
     */
    private function mapEntityToTransfer(PyzPlanet $planetEntity): PlanetTransfer
    {
        return (new PlanetTransfer())->fromArray($planetEntity->toArray());
    }
}
