<?php

namespace Pyz\Yves\HelloWorld\Plugin\Provider;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

class HelloWorldRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    protected const ROUTE_HELLO_WORLD = 'hello-world';

    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/hello-world', 'HelloWorld', 'Index', 'indexAction');
        $routeCollection->add(static::ROUTE_HELLO_WORLD, $route);

        return $routeCollection;
    }
}
