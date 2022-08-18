<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
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
     * @return PlanetCollectionTransfer
     */
    public function findAllPlanetCollection(): PlanetCollectionTransfer
    {
        $planetCollection = $this->createPyzPlanetQuery()->find();
        $planetCollectionTransfer = new PlanetCollectionTransfer();

        foreach ($planetCollection->getData() as $planetTransfer) {
            $transfer = new PlanetTransfer();
            $transfer->fromArray($planetTransfer->toArray());
            $planetCollectionTransfer->addPlanet($transfer);
        }

        return $planetCollectionTransfer;

//        $planetCollection = $this->createPyzPlanetQuery()->find();
//
//        foreach ($planetCollection as $planetTransfer) {
//            $transfer = new PlanetCollectionTransfer();
//            $transfer->fromArray($planetTransfer->toArray());
//        }
//
//        return $planetCollection;
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
