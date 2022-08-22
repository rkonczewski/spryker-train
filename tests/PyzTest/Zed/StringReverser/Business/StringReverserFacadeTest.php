<?php

namespace PyzTest\Zed\StringReverser\Business;

use Codeception\Test\Unit;
use Generated\Shared\DataBuilder\StringReverserBuilder;


class StringReverserFacadeTest extends Unit
{
    /**
     * @var \PyzTest\Zed\StringReverser\StringReverserBusinessTester
     */
    protected $tester;

    /**
     * @return void
     */
    public function testStringIsReversedCorrectly(): void
    {
        $stringReverserTransfer = (new StringReverserBuilder([
            'originalString' => 'Hello Spryker!'
        ]))->build();

        $stringReverserResultTransfer = $this->tester->getFacade()->reverseString($stringReverserTransfer);

        $this->assertSame('!rekyrpS olleH', $stringReverserResultTransfer->getReversedString());
    }
}
