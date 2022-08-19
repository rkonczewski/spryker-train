<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Planet\Business\PlanetFacadeInterface getFacade()
 * @method \Pyz\Zed\Planet\Communication\PlanetCommunicationFactory getFactory()
 */
class DeleteController extends AbstractController
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function indexAction(Request $request): RedirectResponse
    {
        $idPlanet = $this->castId($request->query->get('id-planet'));

        if (empty($idPlanet)) {
            $this->addErrorMessage('Error occurs. Please try again.');
            return $this->redirectResponse('/planet/list');
        }

        $planetTransfer = $this->getFacade()->findPlanetById($idPlanet);
        if (empty($planetTransfer)) {
            $this->addErrorMessage('Error occurs. Please try again.');
            return $this->redirectResponse('/planet/list');
        }

        $this->getFacade()->deletePlanetEntity($planetTransfer);
        $this->addSuccessMessage('Planet deleted successfully.');

        return $this->redirectResponse('/planet/list');
    }
}
