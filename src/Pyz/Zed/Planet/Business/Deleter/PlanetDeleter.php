<?php

namespace Pyz\Zed\Planet\Business\Deleter;

use Generated\Shared\Transfer\PlanetTransfer;
use Propel\Runtime\Exception\PropelException;
use Pyz\Zed\Planet\Persistence\PlanetEntityManagerInterface;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

class PlanetDeleter implements PlanetDeleterInterface
{
    /**
     * @var PlanetEntityManagerInterface
     */
    protected $planetEntityManager;

    /**
     * @param PlanetEntityManagerInterface $planetEntityManager
     */
    public function __construct(PlanetEntityManagerInterface $planetEntityManager)
    {
        $this->planetEntityManager = $planetEntityManager;
    }

    /**
     * @param PlanetTransfer $planetTransfer
     * @return mixed|null
     * @throws AmbiguousComparisonException
     * @throws PropelException
     */
    public function deletePlanetEntity(PlanetTransfer $planetTransfer)
    {
        return $this->planetEntityManager->deletePlanetEntity($planetTransfer);
    }
}
