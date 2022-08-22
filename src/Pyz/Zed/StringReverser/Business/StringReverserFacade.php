<?php

namespace Pyz\Zed\StringReverser\Business;

use Generated\Shared\Transfer\StringReverserTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;



class StringReverserFacade extends AbstractFacade implements StringReverserFacadeInterface
{
    /**
     * @param StringReverserTransfer $stringReverserTransfer
     * @return StringReverserTransfer
     */
    public function reverseString(StringReverserTransfer $stringReverserTransfer): StringReverserTransfer
    {
        return $this->getFactory()
            ->createStringReverser()
            ->reverse($stringReverserTransfer);
    }
}
