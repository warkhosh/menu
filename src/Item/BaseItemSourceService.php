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
    public function getEntitiesFromItems(array $items)
    {
        return [];
    }
}