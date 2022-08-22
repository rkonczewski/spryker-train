<?php

namespace Pyz\Zed\StringReverser\Business\Reverser;

use Generated\Shared\Transfer\StringReverserTransfer;

interface StringReverserInterface
{
    /**
     * @param StringReverserTransfer $stringReverserTransfer
     * @return StringReverserTransfer
     */
    public function reverse(StringReverserTransfer $stringReverserTransfer): StringReverserTransfer;
}
