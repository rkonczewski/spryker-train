<?php

namespace Pyz\Zed\Planet;

use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Spryker\Service\Container\Exception\ContainerException;
use Spryker\Zed\Kernel\Container;

class PlanetDependencyProvider extends \Spryker\Zed\Kernel\AbstractBundleDependencyProvider
{
    public const QUERY_PLANET = 'QUERY_PLANET';
    /**
     * @param Container $container
     *
     * @return Container
     * @throws ContainerException
     * @throws
    \Spryker\Service\Container\Exception\FrozenServiceException
     */
    public function provideCommunicationLayerDependencies(Container
    $container): Container
    {
        $container = $this->addPyzPlanetPropelQuery($container);
        return $container;
    }
    /**
     * @param Container $container
     *
     * @return Container
     * @throws ContainerException
     * @throws
    \Spryker\Service\Container\Exception\FrozenServiceException
     */
    private function addPyzPlanetPropelQuery(Container $container):
    Container
    {
        $container->set(
            static::QUERY_PLANET,
            $container->factory(
                fn() => PyzPlanetQuery::create()
            )
        );
        return $container;
    }
}
