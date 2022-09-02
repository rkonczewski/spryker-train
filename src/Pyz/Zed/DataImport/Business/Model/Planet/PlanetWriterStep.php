<?php

namespace Pyz\Zed\DataImport\Business\Model\Planet;

use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Propel\Runtime\Exception\PropelException;
use Pyz\Zed\Planet\Dependency\PlanetEvents;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\PublishAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

class PlanetWriterStep extends PublishAwareStep implements DataImportStepInterface
{

    public const KEY_NAME = 'name';
    public const KEY_INTERESTING_FACTS = 'interesting_facts';
    public const KEY_SIZE = 'size';

    /**
     * @param DataSetInterface $dataSet
     * @return void
     * @throws PropelException
     * @throws AmbiguousComparisonException
     */
    public function execute(DataSetInterface $dataSet)
    {
        $planetEntity = PyzPlanetQuery::create()
            ->filterByName($dataSet[static::KEY_NAME])
            ->findOneOrCreate();

        $planetEntity->setInterestingFact(
            $dataSet[static::KEY_INTERESTING_FACTS]
        );

        $planetEntity->setSize(
            $dataSet[static::KEY_SIZE]
        );

        if ($planetEntity->isNew() || $planetEntity->isModified()) {
            $planetEntity->save();
        }

        $this->addPublishEvents(PlanetEvents::ENTITY_PYZ_PLANET_CREATE, $planetEntity->getIdPlanet());
    }
}
