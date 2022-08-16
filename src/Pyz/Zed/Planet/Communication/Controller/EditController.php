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
class EditController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idPlanet = $this->castId($request->query->get('id-planet'));
        $planet = $this->getPlanet($idPlanet);

        if (empty($planet)) {
            $this->addErrorMessage('Error occurs. Please, try again.');
            return $this->redirectResponse('planets/list');
        }

        $planetTransfer = (new PlanetTransfer())
            ->setIdPlanet($idPlanet)
            ->setName($planet->getName())
            ->setInterestingFact($planet->getInterestingFact());

        $planetForm = $this->getFactory()
            ->createPlanetForm($planetTransfer)
            ->handleRequest($request);

        if ($planetForm->isSubmitted() && $planetForm->isValid()) {
            $this->getFacade()->createPlanetEntity($planetForm->getData());
            $this->addSuccessMessage('Planet was updated.');
            return $this->redirectResponse('/planet/list');
        }

        return $this->viewResponse([
            'planetForm' => $planetForm->createView()
        ]);
    }

    /**
     * @param $planetId
     * @return PlanetTransfer|null
     */
    private function getPlanet($planetId): ?PlanetTransfer
    {
        return $this->getFacade()->findPlanetById($planetId);
    }
}

