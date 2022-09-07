<?php

namespace Pyz\Yves\CmsContentWidgetPlanetConnector;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CmsContentWidgetPlanetConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_PLANET = 'CLIENT_PLANET';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);
        $container = $this->addCmsBlockStorageClient($container);

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return Container
     */
    protected function addCmsBlockStorageClient(Container $container): Container
    {
        $container[static::CLIENT_PLANET] = function (Container $container) {
            return $container->getLocator()->planet()->client();
        };

        return $container;
    }
}

