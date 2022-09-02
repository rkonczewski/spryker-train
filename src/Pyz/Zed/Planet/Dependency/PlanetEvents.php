<?php

namespace Pyz\Zed\Planet\Dependency;

interface PlanetEvents
{
    public const ENTITY_PYZ_PLANET_CREATE = 'Entity.pyz_planet.update';

    public const ENTITY_PYZ_PLANET_UPDATE = 'Entity.pyz.planet.update';

    public const ENTITY_PYZ_PLANET_DELETE = 'Entity.pyz.planet.delete';
}
