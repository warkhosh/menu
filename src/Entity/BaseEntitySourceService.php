<?php

namespace Warkhosh\Menu\Entity;

class BaseEntitySourceService implements EntitySourceServiceInterface
{
    /**
     * Getting Active entities for items
     *
     * @param array $entityIds
     * @return array
     */
    public function getEntityForItem(array $entityIds): array
    {
        return [];
    }
}
