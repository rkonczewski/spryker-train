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
        $planetForm = $this->getFactory()->createPlanetForm()->handleRequest($request);

        if ($planetForm->isSubmitted() && $planetForm->isValid()) {
            $formData[] = $planetForm->getData();

            $planetTransfer = new PlanetTransfer();
            $planetTransfer->fromArray($formData, true);

            $planetTransfer = $this->getFacade()->createPlanetEntity($planetTransfer);

            $this->addSuccessMessage('Planet was created successfully!');
            return $this->redirectResponse('/planet/list');
        }
        return $this->viewResponse([
            'planetForm' => $planetForm->createView()
        ]);
    }
}
