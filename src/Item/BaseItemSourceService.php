<?php

namespace Warkhosh\Menu\Item;

class BaseItemSourceService implements ItemSourceServiceInterface
{
    /**
     * Retrieving Entity Values from a item List
     *
     * @param array $items
     * @return array
     */
    public function getEntitiesFromItems(array $items): array
    {
        return [];
    }

    /**
     * Adding values from entities to the specified menu list
     *
     * @param array $items
     * @param array $entityItems
     * @return array
     */
    public function getAddedEntityForItemList(array $items, array $entityItems): array
    {
        return [];
    }
}
