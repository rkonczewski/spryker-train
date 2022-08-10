<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Generated\Shared\Transfer\PlanetTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class EditController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        // $idPlanet = $this->castId($request->query->get('id-planet'));
        $planetTransfer = (new PlanetTransfer()) // TODO add business logic to retrieve Planet by id
        ->setName('Mock planet')
            ->setInterestingFact('Mock description.');

        $planetForm = $this->getFactory()
            ->createPlanetForm($planetTransfer)
            ->handleRequest($request);

        if ($planetForm->isSubmitted() && $planetForm->isValid()) {
            $this->addSuccessMessage('Planet was updated.');
            return $this->redirectResponse('/planet/list');
        }

        return $this->viewResponse([
            'planetForm' => $planetForm->createView()
        ]);
    }
}

