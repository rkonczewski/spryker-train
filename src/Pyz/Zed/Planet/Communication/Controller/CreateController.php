<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CreateController extends AbstractController
{
    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $planetForm = $this->getFactory()->createPlanetForm()->handleRequest($request);
        if ($planetForm->isSubmitted() && $planetForm->isValid()) {
            $this->addSuccessMessage('Planet was created successfully!');
            return $this->redirectResponse('/planet/list');
        }
        return $this->viewResponse([
            'planetForm' => $planetForm->createView()
        ]);
    }
}
