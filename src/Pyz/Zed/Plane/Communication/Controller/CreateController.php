<?php

namespace Pyz\Zed\Plane\Communication\Controller;

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
        $planeForm = $this->getFatory()
            ->createPlaneForm()
            ->handleRequest();

        if ($planeForm->isSubmittes() && $planeForm->isValid()) {
            $this->addSuccessMessage('New plane was added to library.');

            return $this->redirectResponse('plane/list');
        }
        return $this->viewResponse([
            'planeForm' => $planeForm->createView()
        ]);
    }
}
