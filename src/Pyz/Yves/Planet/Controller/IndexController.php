<?php

namespace Pyz\Yves\Planet\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Spryker\Yves\Kernel\View\View;

/**
 * @method \Pyz\Client\Planet\PlanetClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param string $name
     *
     * @return View
     */
    public function indexAction(string $name)
    {
        $planet = $this->getClient()->getPlanetByName($name);

        return $this->view(
            [
                'planet' => $planet,
            ],
            [],
            '@Planet/views/index/index.twig'
        );
    }
}

