<?php

namespace Pyz\Yves\PersonalizedProduct\Controller;

use Spryker\Yves\Kernel\View\View;

use Spryker\Yves\Kernel\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @param $limit
     * @return View
     */
    public function indexAction($limit)
    {
        $searchResults = $this->getClient()->getPersonalizedProducts($limit);

        return $this->view(
            $searchResults,
            [],
            '@PersonalizedProduct/views/index/index.twig'
        );
    }
}
