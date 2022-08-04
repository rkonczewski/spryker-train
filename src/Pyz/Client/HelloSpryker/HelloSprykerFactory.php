<?php

namespace Pyz\Client\HelloSpryker;

use Pyz\Client\HelloSpryker\Zed\HelloSprykerZedStub;
use Pyz\Client\HelloSpryker\Zed\HelloSprykerZedStubInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class HelloSprykerFactory extends AbstractFactory
{
    /**
     * @return HelloSprykerZedStubInterface
     * @throws ContainerKeyNotFoundException
     */
    public function createHelloSprykerZedStub(): HelloSprykerZedStubInterface
    {
        return new HelloSprykerZedStub($this->getZedRequestClient());
    }

    /**
     * @return ZedRequestClientInterface
     * @throws ContainerKeyNotFoundException
     */
    protected function getZedRequestClient(): ZedRequestClientInterface
    {
        return $this->getProvidedDependency(HelloSprykerDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
