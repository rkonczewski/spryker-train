<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListController extends AbstractController
{
    /**
     * @method \Pyz\Zed\Planet\Communication\PlanetCommunicationFactory getFactory()
     * @return array
     */
    public function indexAction(): array
    {
        $planetTable = $this->getFactory()->createPlanetTable();
        return $this->viewResponse([
            'planetTable' => $planetTable->render()
        ]);
    }

    public function tableAction(): JsonResponse
    {
        $planetTable = $this->getFactory()->createPlanetTable();
        return $this->jsonResponse($planetTable->fetchData());
    }
}
