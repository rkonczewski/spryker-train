<?php

namespace Pyz\Zed\Planet\Communication;

use Generated\Shared\Transfer\PlanetTransfer;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Pyz\Zed\Planet\Communication\Form\PlanetForm;
use Pyz\Zed\Planet\Communication\Table\PlanetTable;
use Pyz\Zed\Planet\PlanetDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Symfony\Component\Form\FormInterface;

class PlanetCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return PlanetTable
     * @throws ContainerKeyNotFoundException
     */
    public function createPlanetTable(): PlanetTable
    {
        return new PlanetTable($this->getPlanetPropelQuery());
    }

    /**
     * @return PyzPlanetQuery
     * @throws ContainerKeyNotFoundException
     */
    private function getPlanetPropelQuery(): PyzPlanetQuery
    {
        return $this->getProvidedDependency(PlanetDependencyProvider::QUERY_PLANET);
    }

    /**
     * @param PlanetTransfer|null $planetTransfer
     * @param array $options
     * @return FormInterface
     */
    public function createPlanetForm(PlanetTransfer $planetTransfer = null, array $options = []): FormInterface
    {
        return $this->getFormFactory()->create(PlanetForm::class, $planetTransfer, $options);
    }
}
