<?php

namespace Pyz\Zed\HelloSpryker\Persistence;

use Generated\Shared\Transfer\HelloSprykerTransfer;

interface HelloSprykerRepositoryInterface
{
    /**
     * @param int $idHelloSpryker
     * @return HelloSprykerTransfer|null
     */
    //todo: int
    public function findPyzHelloSprykerById($idHelloSpryker): ?HelloSprykerTransfer;
}
