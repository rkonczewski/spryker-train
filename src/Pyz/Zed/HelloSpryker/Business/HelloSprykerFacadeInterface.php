<?php

namespace Pyz\Zed\HelloSpryker\Business;

use Generated\Shared\Transfer\HelloSprykerTransfer;

interface HelloSprykerFacadeInterface
{
    /**
     * @param HelloSprykerTransfer $helloSprykerTransfer
     * @return HelloSprykerTransfer
     * @api
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer;

    /**
     * @param HelloSprykerTransfer $helloSprykerTransfer
     * @return HelloSprykerTransfer
     */
    public function createHelloSprykerEntity(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer;

    /**
     * @param HelloSprykerTransfer $helloSprykerTransfer
     * @return HelloSprykerTransfer
     */
    public function findHelloSpryker(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer;
}
