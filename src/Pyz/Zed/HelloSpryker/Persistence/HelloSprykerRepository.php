<?php

namespace Pyz\Zed\HelloSpryker\Persistence;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

/**
 * @method \Pyz\Zed\HelloSpryker\Persistence\HelloSprykerPersistenceFactory getFactory()
 */
class HelloSprykerRepository extends AbstractRepository implements HelloSprykerRepositoryInterface
{
    /**
     * @param int $idHelloSpryker
     *
     * @return HelloSprykerTransfer|null
     * @throws AmbiguousComparisonException
     */
    //todo: int
    public function findPyzHelloSprykerById($idHelloSpryker): ?HelloSprykerTransfer
    {
        $helloSprykerEntity = $this->getFactory()
            ->createHelloSprykerQuery()
            ->filterByIdHelloSpryker($idHelloSpryker)
            ->findOne();

        if (!$helloSprykerEntity) {
            return null;
        }

        return (new HelloSprykerTransfer())
            ->fromArray($helloSprykerEntity->toArray(), true);
    }
}
