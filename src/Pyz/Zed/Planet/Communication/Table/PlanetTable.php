<?php

namespace Pyz\Zed\Planet\Communication\Table;

use Orm\Zed\Planet\Persistence\Map\PyzPlanetTableMap;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;
use Spryker\Service\UtilText\Model\Url\Url;

class PlanetTable extends AbstractTable
{
    /**
     * @var string
     */
    public const ACTION = 'Actions';

    /**
     * @var PyzPlanetQuery
     */
    private PyzPlanetQuery $planetQuery;

    /**
     * @param PyzPlanetQuery $planetQuery
     */
    public function __construct(PyzPlanetQuery $planetQuery)
    {
        $this->planetQuery = $planetQuery;
    }

    /**
     * @inheritDoc
     * @param TableConfiguration $config
     * @return TableConfiguration
     */
    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            PyzPlanetTableMap::COL_NAME => 'Planet name',
            PyzPlanetTableMap::COL_INTERESTING_FACT => 'Interesting fact',
            PyzPlanetTableMap::COL_SIZE => 'Size',
            static::ACTION => 'Actions',
        ]);
        $config->setRawColumns([static::ACTION]);
        $config->setSortable([
            PyzPlanetTableMap::COL_NAME,
            PyzPlanetTableMap::COL_INTERESTING_FACT,
            PyzPlanetTableMap::COL_SIZE,
        ]);
        $config->setSearchable([
            PyzPlanetTableMap::COL_NAME,
            PyzPlanetTableMap::COL_SIZE,
        ]);
        return $config;
    }

    /**
     * @inheritDoc
     * @param TableConfiguration $config
     * @return array
     */
    protected function prepareData(TableConfiguration $config): array
    {
        $planetDataItems = $this->runQuery($this->planetQuery, $config);
        $planetTableRows = [];

        foreach ($planetDataItems as $planetDataItem) {
            $planetTableRows[] = [
                PyzPlanetTableMap::COL_NAME => $planetDataItem[PyzPlanetTableMap::COL_NAME],
                PyzPlanetTableMap::COL_INTERESTING_FACT => $planetDataItem[PyzPlanetTableMap::COL_INTERESTING_FACT],
                PyzPlanetTableMap::COL_SIZE => $planetDataItem[PyzPlanetTableMap::COL_SIZE],
                static::ACTION => $this->generateEditButton(
                        Url::generate('/planet/edit/', [
                            'id-planet' => $planetDataItem[PyzPlanetTableMap::COL_ID_PLANET],
                        ]),
                        'Edit'
                    ) . $this->generateRemoveButton(
                        Url::generate(
                            '/planet/delete',
                            [
                                'id-planet' => $planetDataItem[PyzPlanetTableMap::COL_ID_PLANET],
                            ]
                        ),
                        'Delete'
                    )
            ];
        }
        return $planetTableRows;
    }
}
