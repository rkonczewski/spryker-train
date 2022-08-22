<?php

namespace Pyz\Zed\StringReverser\Business;

use Generated\Shared\Transfer\StringReverserTransfer;

interface StringReverserFacadeInterface
{
    /**
     * @param StringReverserTransfer $stringReverserTransfer
     * @return StringReverserTransfer
     */
    public function reverseString(StringReverserTransfer $stringReverserTransfer): StringReverserTransfer;
}
