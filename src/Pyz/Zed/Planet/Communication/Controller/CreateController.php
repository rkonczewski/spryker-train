<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Generated\Shared\Transfer\PlanetTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Planet\Business\PlanetFacadeInterface getFacade()
 * @method \Pyz\Zed\Planet\Communication\PlanetCommunicationFactory getFactory()
 */
class CreateController extends AbstractController
{
    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $planetForm = $this->getFactory()
            ->createPlanetForm()
            ->handleRequest($request);

        if ($planetForm->isSubmitted() && $planetForm->isValid()) {
            $this->getFacade()->createPlanetEntity($planetForm->getData());
            $this->addSuccessMessage('Planet was created successfully!');

            return $this->redirectResponse('/planet/list');
        }
        return $this->viewResponse([
            'planetForm' => $planetForm->createView()
        ]);
    }
}
